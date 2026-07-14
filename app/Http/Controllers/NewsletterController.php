<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Mail\AuthorNewsletter;

use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:newsletters,email',
        ]);

        Newsletter::create([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Subscribed Successfully!');
    }



public function index(Request $request)
{
    $query = Newsletter::query();
 
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });
    }
 
    $subscribers = $query->orderBy('created_at', 'desc')->paginate(5);
 
    // Same single view handles both the full page AND the AJAX content refresh
    return view('newsletter.index', compact('subscribers'));
}
 
public function destroy($id)
{
    Newsletter::findOrFail($id)->delete();
 
    if (request()->ajax()) {
        return response()->json(['success' => true, 'message' => 'Subscriber deleted successfully.']);
    }
 
    return redirect()->route('newsletter.index')
                     ->with('success', 'Subscriber deleted successfully.');
}

 
   /////////////////////////////////////////////
   public function create()
{
    return view('newsletter.create');
}



public function sendNewsletter(Request $request)
{
    $request->validate([
        'message' => 'required'
    ]);

    $subscribers = Newsletter::all();

    foreach ($subscribers as $subscriber) {

        Mail::to($subscriber->email)
            ->send(new AuthorNewsletter(
                $subscriber,
                $request->message
            ));
    }

    return back()->with('success', 'Newsletter sent successfully.');
}











}
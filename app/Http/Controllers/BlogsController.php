<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class BlogsController extends Controller
{
    public function create()
    {
        return view('blogs.createBlogs');
    }

    public function store(Request $request)
    {
        // Validate
        $validated = $request->validate([
            'heading'   => 'required|string|max:255',
            'paragraph' => 'required|string',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'link'      => 'nullable|url|max:255',
        ], [
    'heading.required'   => 'Heading is required.',
    'heading.max'        => 'Heading cannot exceed 255 characters.',
    'paragraph.required' => 'Paragraph is required.',
    'image.required'     => 'Please select an image.',
    'image.image'        => 'Please upload a valid image file (jpeg, png, jpg, gif, webp).',
    'image.mimes'        => 'Unsupported image format. Only jpeg, png, jpg, gif, and webp are allowed.',
    'image.max'          => 'Image size cannot exceed 2MB.',
    'link.url'           => 'Please enter a valid URL (e.g. https://example.com).',
        ]);

        // Store image in storage/app/public/blogs/
        $imagePath = $request->file('image')->store('blogs', 'public');

        // Generate public URL for database
        $imageUrl = asset('storage/' . $imagePath);

        // Save to database
        Blog::create([
            'heading'   => $validated['heading'],
            'paragraph' => $validated['paragraph'],
            'image'     => $imageUrl,
            'link'      => $validated['link'] ?? null,
        ]);

        return redirect()->route('blogs.create')
           ->with('success', 'Blog published successfully!');
    }


       public function index()
    {
        $blogs = Blog::latest()->paginate(6);
        return view('blogs.blogs_list', compact('blogs'));
    }
      


     public function edit(Blog $blog)
    {
        return view('blogs.blogs_edit', compact('blog'));
    }

    // ── Update ──
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'heading'   => 'required|string|max:255',
            'paragraph' => 'required|string',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'link'      => 'nullable|url|max:255',
        ], [
    'heading.required'   => 'Heading is required.',
    'heading.max'        => 'Heading cannot exceed 255 characters.',
    'paragraph.required' => 'Paragraph is required.',
    'image.image'        => 'Please upload a valid image file.',
    'image.mimes'        => 'Supported formats: jpeg, png, jpg, gif, webp.',
    'image.max'          => 'Image size cannot exceed 2MB.',
    'link.url'           => 'Please enter a valid URL (e.g. https://example.com).',
        ]);

        // Handle new image upload
        if ($request->hasFile('image')) {
            $oldPath = str_replace(asset('storage/'), '', $blog->image);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
            $imagePath = $request->file('image')->store('blogs', 'public');
            $validated['image'] = asset('storage/' . $imagePath);
        }

        $blog->update([
            'heading'   => $validated['heading'],
            'paragraph' => $validated['paragraph'],
            'image'     => $validated['image'] ?? $blog->image,
            'link'      => $validated['link'] ?? null,
        ]);

        return redirect()->route('blogs.index')
           ->with('success', 'Blog updated successfully!');
    }

    // ── Delete ──
    public function destroy(Blog $blog)
    {
        $oldPath = str_replace(asset('storage/'), '', $blog->image);
        if (Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }

        $blog->delete();

        return redirect()->route('blogs.index')
           ->with('success', 'Blog deleted successfully!');
    }





      public function allBlogs()
{
    $blogs = Blog::latest()->get();
    return view('all_blogs', compact('blogs')); 
}


 public function indexs()
    {
        return view('author_bio');
    }

 //////////////////////////


   public function indexx()
    {
        $books = Book::latest()->paginate(9);
 
        return view('book.single_book', compact('books'));
    }
 
    /**
     * Single book detail page.
     * Route model binding: {book} in the URL resolves straight to a Book instance.
     */
    public function show(Book $book)
    {
        $relatedBooks = Book::where('id', '!=', $book->id)
            ->inRandomOrder()
            ->take(3)
            ->get();
 
        return view('book.single_book', compact('book', 'relatedBooks'));
    }


///////////////
 public function total_book(Request $request)
{
    $show = (int) $request->query('show', 2);

    $query = Book::query();

    $totalCount = $query->count();
    $books = $query->limit($show)->get();

    return view('book.All_books', [
        'books'      => $books,
        'show'       => $show,
        'totalCount' => $totalCount,
        'hasMore'    => $show < $totalCount,
    ]);

}
    










}
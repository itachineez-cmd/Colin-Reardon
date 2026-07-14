<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display all books — full record table.
     */
    public function index()
    {
        $books = Book::latest()->get();
        return view('book.index', compact('books'));
    }

    /**
     * Show the create form.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a new book.
     */
    public function store(Request $request)
    {
       $request->validate([
    'book_name'        => 'required|string|max:255',
    'book_detail'      => 'required|string',
    'book_pages'       => 'required|integer|min:1',
    'book_image'       => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    'goodreads_link'   => 'nullable|url|max:255',
    'amazon_link'      => 'nullable|url|max:255',
    'ingramspark_link' => 'nullable|url|max:255',
]);

$imagePath = $request->file('book_image')->store('books', 'public');

Book::create([
    'book_name'        => $request->book_name,
    'book_detail'      => $request->book_detail,
    'book_pages'       => $request->book_pages,
    'book_image'       => $imagePath,
    'goodreads_link'   => $request->goodreads_link,
    'amazon_link'      => $request->amazon_link,
    'ingramspark_link' => $request->ingramspark_link,
]);

      return redirect()->route('books.index')
                 ->with('success', 'Book published successfully!');
    }

    /**
     * Show edit form.
     */
    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    /**
     * Update the book.
     */
    public function update(Request $request, Book $book)
    {
      $request->validate([
    'book_name'        => 'required|string|max:255',
    'book_detail'      => 'required|string',
    'book_pages'       => 'required|integer|min:1',
    'book_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048|dimensions:min_width=600,min_height=900',
    'goodreads_link'   => 'nullable|url|max:255',
    'amazon_link'      => 'nullable|url|max:255',
    'ingramspark_link' => 'nullable|url|max:255',
]);

$data = [
    'book_name'        => $request->book_name,
    'book_detail'      => $request->book_detail,
    'book_pages'       => $request->book_pages,
    'goodreads_link'   => $request->goodreads_link,
    'amazon_link'      => $request->amazon_link,
    'ingramspark_link' => $request->ingramspark_link,
];

if ($request->hasFile('book_image')) {
    if ($book->book_image) {
        Storage::disk('public')->delete($book->book_image);
    }
    $data['book_image'] = $request->file('book_image')->store('books', 'public');
}

$book->update($data);

       return redirect()->route('books.index')
                 ->with('success', 'Book updated successfully!');
    }

    /**
     * Delete the book.
     */
    public function destroy(Book $book)
    {
        if ($book->book_image) {
            Storage::disk('public')->delete($book->book_image);
        }

        $book->delete();

        return redirect()->route('books.index')
                 ->with('success', 'Book deleted successfully!');
    }
    

  //////////////////////
  






     
}
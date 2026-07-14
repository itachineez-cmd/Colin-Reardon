<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Models\Book;
use App\Models\Blog;

class authController extends Controller
{
       public function showLogin()
    {
        return view('admin.login');
    }


 



   

public function index()
{
    $books = Book::latest()->take(3)->get();
    $blogs = Blog::latest()->take(4)->get();

    return view('index', compact('books', 'blogs'));
}







}

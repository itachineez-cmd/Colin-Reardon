<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Mail;




Route::get('/aa', function () {
    return view('test.blade');
});



// Route::get('/ss', function () {
//     return view('single_books');
// });



// Route::get('/s', function () {
//     return view('admin.admin');
// });




/////        login  
  Route::get('/login',  [AdminController::class,'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login']);

///              login

Route::middleware('auth')->group(function () {

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
                            ////////// BlogsRouts
Route::get('/blogs/create', [BlogsController::class, 'create'])->name('blogs.create');
Route::post('/blogs', [BlogsController::class, 'store'])->name('blogs.store');
Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}/edit', [BlogsController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{blog}', [BlogsController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{blog}', [BlogsController::class, 'destroy'])->name('blogs.destroy');

                          ///////////// booksRouts
  

Route::resource('books', BookController::class);
//// newsletter

Route::get('/newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
Route::delete('/newsletter/{id}', [NewsletterController::class, 'destroy'])->name('newsletter.destroy');
Route::get('/newsletters', [NewsletterController::class, 'create'])
    ->name('newsletter.create');

Route::post('/newsletter/send', [NewsletterController::class, 'sendNewsletter'])
    ->name('newsletter.send');
    Route::get('/admin/update-profile', [AdminController::class, 'edit'])
    ->name('admin.profile.edit');
 
// Form submit hone par (POST)
Route::post('/admin/update-profile', [AdminController::class, 'update'])
    ->name('admin.profile.update');




});
Route::get('/', [AuthController::class, 'index'])->name('index');
Route::get('/blogss', [BlogsController::class, 'allBlogs'])->name('blogs.all');
Route::get('/biography', [BlogsController::class,  'indexs'])->name('biography');
Route::post('/', [NewsletterController::class, 'store'])->name('newsletter.store');
Route::get('/single_book', [BlogsController::class, 'indexx'])->name('blogs.indexx');
Route::get('/single_book/{book}', [BlogsController::class, 'show'])->name('blogs.show');
Route::get('/total_book', [BlogsController::class, 'total_book'])->name('total.book');
 


//////////////////// Admin CONTROLLER/////////////




   
/*
|--------------------------------------------------------------------------
| Newsletter Subscribers Routes
|--------------------------------------------------------------------------
| Inhe apni web.php me add kar dein.
*/







//////////////////////////////////////


    



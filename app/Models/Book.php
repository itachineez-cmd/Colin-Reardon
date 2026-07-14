<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

  protected $fillable = [
    'book_name',
    'book_detail',
    'book_pages',
    'book_image',
    'goodreads_link',
    'amazon_link',
    'ingramspark_link',
];
}
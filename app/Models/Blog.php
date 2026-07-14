<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  
protected $fillable = ['heading', 'paragraph', 'image', 'link'];
}


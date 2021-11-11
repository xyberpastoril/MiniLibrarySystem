<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_Authors extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function author()
    {
        return $this->hasOne(Author::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function book_genres()
    {
        return $this->hasMany(Book_Genres::class);
    }

    public function book_authors()
    {
        return $this->hasMany(Book_Authors::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}

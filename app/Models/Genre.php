<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public function book_genres()
    {
        return $this>belongsTo(Book::class);
    }

    /** FUNCTIONS */

    public static function getBookGenres($id)
    {
        return self::where('book_id', '=', $id)->orderBy('name', 'asc')->get();
    }
}

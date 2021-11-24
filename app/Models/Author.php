<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /** FUNCTIONS **/

    public static function getBookAuthors($id)
    {
        return self::where('book_id', '=', $id)->orderBy('name', 'asc')->get();
    }
}

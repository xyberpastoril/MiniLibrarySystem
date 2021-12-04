<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];

    public function book_genres()
    {
        return $this->belongsTo(Book::class);
    }

    /** FUNCTIONS */

    public static function getBookGenres($id)
    {
        return self::selectRaw("GROUP_CONCAT(name SEPARATOR ', ') as `genres`")
            ->groupBy('book_id')
            ->where('book_id', '=', $id)->get();
    }

    public static function getAllGenres()
    {
        return self::selectRaw("name")
            ->orderBy("name", "asc")
            ->groupBy("name")
            ->get();
    }
}

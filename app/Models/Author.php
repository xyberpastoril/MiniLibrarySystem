<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
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

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /** FUNCTIONS **/

    public static function getBookAuthors($id)
    {
        // return self::selectRaw("GROUP_CONCAT(name SEPARATOR ', ') as `authors`")
        //     ->groupBy('book_id')
        //     ->where('book_id', '=', $id)->get();

        return self::select('authors.name')
            ->where('book_id', '=', $id)->orderBy('name', 'asc')->get();
    }
}

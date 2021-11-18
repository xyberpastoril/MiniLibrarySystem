<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function genres()
    {
        return $this->hasMany(Genre::class);
    }

    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    /** FUNCTIONS */
    
    public static function getNewArrivals()
    {
        $newArrivals = self::limit(5)->latest()->get();
        for($i = 0; $i < 5; $i++)
            $newArrivals[$i]['authors'] = $newArrivals[$i]->authors()->get();

        return $newArrivals;
    }

    /**
     * Get 5 hot books that are being borrowed in the past month.
     */
    public static function getHotBooks()
    {
        // Subject to change
        $hotBooks = self::selectRaw('books.id, books.title, COUNT(transactions.id) as total')
            ->leftJoin('transactions', 'books.id', '=', 'transactions.book_id')
            ->groupBy('books.id', 'books.title')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();
        for($i = 0; $i < 5; $i++)
            $hotBooks[$i]['authors'] = $hotBooks[$i]->authors()->get();

        return $hotBooks;
    }

    public static function search($title, $genre)
    {
        // SELECT DISTINCT books.title 
        // FROM books 
        // LEFT JOIN genres on books.id = genres.book_id 
        // WHERE books.title LIKE "%antiques%" 
        //  AND genres.name LIKE "%fiction%" 
        //  OR genres.name LIKE "%general%"

        $obj = self::distinct()
            ->where('books.title', 'LIKE', '%' . ($title ? $title : NULL) . '%' );

        if(count($genre))
        {
            $obj->leftJoin('genres', 'books.id', '=', 'genres.book_id');

            for($i = 0; $i < count($genre); $i++)
            {
                if($i == 0) $obj->where('genres.name', 'LIKE', '%'. $genre[$i] .'%');
                else $obj->orWhere('genres.name', 'LIKE', '%'. $genre[$i] .'%');
            }
        }
        $obj = $obj->paginate(10);

        for($i = 0; $i < count($obj); $i++)
            $obj[$i]['authors'] = $obj[$i]->authors()->get();
        
        return $obj;
    }
}

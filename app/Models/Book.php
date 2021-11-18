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

    public static function selectSearch($search)
    {
        return self::where('title', 'LIKE', '%' . ($search ? $search : NULL) . '%' )
            ->paginate(10);
    }
}

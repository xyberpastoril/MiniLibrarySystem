<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->hasOne(Book::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function penalty()
    {
        return $this->belongsTo(Penalty::class);
    }

    /** FUNCTIONS */

    public static function bookSearchSub()
    {
        // select books.id, books.title, count(transactions.id) as copies_used
        // from transactions
        // join books on transactions.book_id = books.id
        // where transactions.status = 'unclaimed' or transactions.status = 'claimed' or transactions.status = 'pending'
        // group by books.id

        return self::select('books.id', 'books.title', DB::raw('count(transactions.id) as copies_used') )
            ->join('books', 'transactions.book_id', '=', 'books.id')
            ->where('transactions.status', '=', 'unclaimed')
            ->orWhere('transactions.status', '=', 'claimed')
            ->orWhere('transactions.status', '=', 'pending')
            ->groupBy('books.id', 'books.title');
    }
}

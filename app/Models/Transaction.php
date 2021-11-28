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

    public static function search($search, $status, $user)
    {
        $obj = self::select(
                DB::raw('users.id as user_id'), 
                'users.first_name', 
                'users.last_name', 
                'transactions.id',
                'transactions.date_from',
                'transactions.date_to',
                'transactions.copies',
                'transactions.penalty',
                'transactions.date_accepted',
                'transactions.date_returned',
                'transactions.status',
                DB::raw('transactions.created_at as date_requested'),
                DB::raw('books.id as book_id'),
                'books.isbn')
            ->leftJoin('books', 'transactions.book_id', '=', 'books.id')
            ->leftJoin('users', 'transactions.user_id', '=', 'users.id')
            ->orderBy('transactions.created_at', 'desc');

        if($search)
        {
            $obj->where(function ($query) use ($search) {
                $query->where('transactions.id', 'LIKE', '%' . ($search ? $search : NULL) . '%')
                    ->orWhere('books.id', 'LIKE', '%' . ($search ? $search : NULL) . '%');
            });
        }

        switch($status)
        {
            case "waiting":
                $obj->where('transactions.status', '=', 'pending');
                break;
            case "in_progress":
                $obj->where(function ($query) {
                    $query->where('transactions.status', '=', 'unclaimed')
                        ->orWhere('transactions.status', '=', 'claimed');
                });
                break;
            case "history":
                $obj->where('transactions.status', '=', 'returned');
                break;
        }

        if($user->getRoleNames()[0] == "Member") {
            $obj->where('users.id', '=', $user->id);
        }

        // $obj = $obj->paginate(10);
        $obj = $obj->get();

        // Append other parameters to auto-generated page urls
        // if($search) $obj->appends(['search' => $search]);
        // if($status) $obj->appends(['status' => $status]);

        return $obj;
    }

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

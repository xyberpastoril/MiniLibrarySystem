<?php

namespace App\Http\Controllers;

use App\Models\member;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;

class TransactionController extends Controller
{
    /**
     * Require admin access.
     */
    public function waiting_for_approval()
    {
        $t = \App\Models\Transaction::search(null, "waiting", \Illuminate\Support\Facades\Auth::user());

        if(\Illuminate\Support\Facades\Auth::user()->hasRole('Librarian'))
        {
            return view("admin.transactions.waiting_for_approval", [
                "allTransactions" => $t,
            ]);
        }
        return view("member.transactions.waiting_for_approval", [
            "allTransactions" => $t,
        ]);
    }

    /**
     * Require admin access.
     */
    public function in_progress()
    {
        $t = \App\Models\Transaction::search(null, "in_progress", \Illuminate\Support\Facades\Auth::user());

        if(\Illuminate\Support\Facades\Auth::user()->hasRole('Librarian'))
        {
            return view("admin.transactions.in_progress", [
                "allTransactions" => $t,
            ]);
        }
        return view("member.transactions.in_progress", [
            "allTransactions" => $t,
        ]);
    }

    /**
     * Require admin access.
     */
    public function history()
    {
        $t = \App\Models\Transaction::search(null, "history", \Illuminate\Support\Facades\Auth::user());
        if(\Illuminate\Support\Facades\Auth::user()->hasRole('Librarian'))
        {
            return view("admin.transactions.history", [
                "allTransactions" => $t,
            ]);
        }
        return view("member.transactions.history", [
            "allTransactions" => $t,
        ]);
    }

    /** Create */

    public function request(Request $request, \App\Models\Book $book)
    {
        // Check for copy availability
        $used_books = \App\Models\Transaction::where('book_id', '=', $book->id)
            ->where('status', '!=', 'returned')->count();

        $book->copies_left = $book->copies_owned - $used_books;

        if($book->copies_left < 1) {
            return [
                'success' => 0,
                'error' => 'no_copies_left'
            ];
        }

        $date = explode(" - ", $request->date);
        $request->date_from = date('Y-m-d', strtotime($date[0]));
        $request->date_to = date('Y-m-d', strtotime($date[1]));

        $today = \Carbon\Carbon::now()->toDateString();

        // Check if date_from is before today
        if($today > $request->date_from) {
            return [
                'success' => 0,
                'error' => 'date_from_before_today'
            ];
        }
        // Check if date_to is before date_from
        if($request->date_from > $request->date_to) {
            return [
                'success' => 0,
                'error' => 'date_to_before_date_from'
            ];
        }

        // TODO: Include Penalty Rate/Day

        \App\Models\Transaction::request($request, $book);

        return [
            'success' => 1,
            'error' => null
        ];
    }

    /** Delete */
    public function cancel(Request $request, \App\Models\Transaction $transaction)
    {
        return \App\Models\Transaction::cancel($transaction);
    }

    /** Update */
    public function approve(\App\Models\Transaction $transaction)
    {
        return \App\Models\Transaction::approve($transaction);
    }

    public function claim(Request $request, \App\Models\Transaction $transaction)
    {
        return \App\Models\Transaction::claim($transaction);
    }

    public function return(Request $request, \App\Models\Transaction $transaction)
    {
        $today = \Carbon\Carbon::now()->toDateString();
        $today = date_create($today);
        $date_to = date_create($transaction->date_to);
        if($today > $date_to)
        {
            $difference = date_diff($today, $date_to)->days;

            // Compute Penalty
            $transaction->penalty()->create([
                'transaction_id' => $transaction->id,
                'amount' => $difference * 10,
                'status' => 'paid'
            ]);
        }

        return \App\Models\Transaction::return($transaction);
    }


    /** JSON */
    public static function search(Request $request)
    {
        return \App\Models\Transaction::search(
            $request->get('search'),
            $request->get('status'),
            \Illuminate\Support\Facades\Auth::user()
        );
    }
}

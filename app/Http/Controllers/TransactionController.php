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
        return view("member.transactions.waiting_for_approval");

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
        return view("member.transactions.in_progress");
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
        return view("member.transactions.history");
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

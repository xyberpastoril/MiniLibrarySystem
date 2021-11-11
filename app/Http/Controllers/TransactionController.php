<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Require admin access.
     */
    public function waiting_for_approval()
    {
        return view("admin.transactions.waiting_for_approval", [
            'auth' => \App\Models\User::selectAuthenticatedUser()
        ]);
    }

    /**
     * Require admin access.
     */
    public function in_progress()
    {
        return view("admin.transactions.in_progress", [
            'auth' => \App\Models\User::selectAuthenticatedUser()
        ]);
    }

    /**
     * Require admin access.
     */
    public function history()
    {
        return view("admin.transactions.history", [
            'auth' => \App\Models\User::selectAuthenticatedUser()
        ]);
    }
}

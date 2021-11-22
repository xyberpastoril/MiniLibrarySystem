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
    public function admin_waiting_for_approval()
    {
        return view("admin.transactions.waiting_for_approval");
    }

    /**
     * Require admin access.
     */
    public function admin_in_progress()
    {
        return view("admin.transactions.in_progress");
    }

    /**
     * Require admin access.
     */
    public function admin_history()
    {
        return view("admin.transactions.history");
    }

    /**
     * Require member access.
     */
    public function member_waiting_for_approval()
    {
        return view("member.transactions.waiting_for_approval");
    }

    /**
     * Require member access.
     */
    public function member_in_progress()
    {
        return view("member.transactions.in_progress");
    }

    /**
     * Require member access.
     */
    public function member_history()
    {
        return view("member.transactions.history");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function overview()
    {
        return view('account.overview');
    }

    public function notifications()
    {
        return view('account.notifications');
    }

    public function settings()
    {
        return view('account.settings');
    }
}

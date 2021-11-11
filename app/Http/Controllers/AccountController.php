<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function overview()
    {
        return view('account.overview', [
            'auth' => \App\Models\User::selectAuthenticatedUser()
        ]);
    }

    public function notifications()
    {
        return view('account.notifications', [
            'auth' => \App\Models\User::selectAuthenticatedUser()
        ]);
    }

    public function settings()
    {
        return view('account.settings', [
            'auth' => \App\Models\User::selectAuthenticatedUser()
        ]);
    }
}

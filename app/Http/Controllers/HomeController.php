<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(\App\Models\User::selectAuthenticatedUser()['role'] == "Librarian")
        {
            return view('admin.dashboard', [
                'auth' => \App\Models\User::selectAuthenticatedUser()
            ]);
        }
        return view('member.home', [
            'auth' => \App\Models\User::selectAuthenticatedUser()
        ]);
    }
}

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
        if(\Illuminate\Support\Facades\Auth::user()->hasRole('Librarian'))
            return view('admin.dashboard');
        return view('member.home', [
            "newArrivals" => \App\Models\Book::getNewArrivals()
        ]);
    }
}

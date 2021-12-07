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
        if(\Illuminate\Support\Facades\Auth::user()->hasRole('Librarian')){
            return view('admin.dashboard', [
                "hotBooks" => \App\Models\Book::getHotBooks()
            ]);
        }
        return view('member.home', [
            "newArrivals" => \App\Models\Book::getNewArrivals(),
            "hotBooks" => \App\Models\Book::getHotBooks()
        ]);
    }

    public function searchBooks(Request $request)
    {
        if(\Illuminate\Support\Facades\Auth::user()->hasRole('Librarian'))
            return view('admin.dashboard');

        $genre = explode(',', $request->genres);
        return view('member.search_results', [
            "book_results" => \App\Models\Book::search(
                $request->search,
                (count($genre) == 1 && $genre[0] != '') || count($genre) > 1
                    ? $genre
                    : null,
                $request->status),
            "isPOST" => $request->isMethod('post')
        ]);
    }

    public function search(Request $request)
    {
        $genre = explode(',', $request->genres);

        return \App\Models\Book::search(
            $request->search,
            (count($genre) == 1 && $genre[0] != '') || count($genre) > 1
                ? $genre
                : null,
            $request->status);
    }

    public function getTransactionsByMonth()
    {
        return \App\Models\Transaction::countByMonth();
    }
}

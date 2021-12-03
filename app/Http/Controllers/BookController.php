<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Different page for Admin and Member
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.books.index", [
            "allBooks" => \App\Models\Book::search(null,null,null),
            "allGenres" => \App\Models\Genre::getAllGenres()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * Only Admins are allowed to Create Books
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = Book::createOrUpdateBook($request);

        // Add genres
        $obj->authors = Book::updateAuthors($request->authors, $obj);
        $obj->genres = Book::updateGenres($request->genre, $obj);

        return redirect()->to('books');
    }

    /**
     * Display the specified resource.
     *
     * Show Book, with different variant for
     * both Admins and Members
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view("member.books.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * Allowed only for Admins
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        if(count($book->genres) > 0) $book['genres'] = Genre::getBookGenres($book->id)[0]->genres;
        else $book['genres'] = "";

        return view("admin.books.edit", compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:books,title,'.$book->id,
            'authors' => 'required|string|max:100',
            'description' => 'required',
            'page_count' => 'required|numeric|min:1',
            'published_date' => 'required|date',
            'isbn' => 'required|string|max:20',
            'genres' => 'nullable|string|max:100',
            'copies_owned' => 'required|numeric|min:1',
            'cover_url' => 'nullable|mimes:jpeg,png,jpg|max:10000',
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator);

        if(isset($request->cover_url))
        {
            if (Storage::exists(public_path('media/books/'.$book->id)))
                unlink('media/books/'.$book->id);

            $request->cover_url->move(public_path('media/books/'), $book->id);
            $request->cover_url = $book->id;
        }
        else $request->cover_url = $book->cover_url;

        Book::createOrUpdateBook($request, $book);
        Book::updateAuthors($request->authors, $book);
        Book::updateGenres($request->genres, $book);

        return redirect()->to('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * Allowed only to Admins.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        return Book::deleteBook($book);
    }

    /** JSON RESPONSES */

    public function search(Request $request)
    {
        $genre = explode(',', $request->get('genre'));

        return Book::search(
            $request->get('search'),
            (count($genre) == 1 && $genre[0] != '') || count($genre) > 1
                ? $genre
                : null,
            $request->get('status')
            );
    }
}

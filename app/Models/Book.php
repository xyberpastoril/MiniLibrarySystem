<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'page_count',
        'isbn',
        'published_date',
        'copies_owned',
        'cover_url'
    ];

    public function genres()
    {
        return $this->hasMany(Genre::class);
    }

    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    /** FUNCTIONS */

    public static function getNewArrivals()
    {
        // $newArrivals = self::limit(5)->latest()->get();
        // for($i = 0; $i < 5; $i++)
        //     $newArrivals[$i]['authors'] = $newArrivals[$i]->authors()->get();

        $sub = Transaction::bookSearchSub();

        $newArrivals = DB::table( DB::raw("( ". $sub->toSql() .") as sub" ) )
            ->distinct('books.title')
            ->select('books.id', 'books.title', 'books.published_date', 'books.isbn','books.created_at', 'books.copies_owned', 'books.cover_url','sub.copies_used', DB::raw("books.copies_owned - sub.copies_used as copies_left") )
            ->mergeBindings( $sub->getQuery() )
            ->rightJoin('books', 'sub.id', '=', 'books.id')
            ->leftJoin('genres', 'books.id', '=', 'genres.book_id')
            ->leftJoin('authors', 'books.id', '=', 'authors.book_id')
            ->latest()
            ->limit(5)
            ->get();

        for($i = 0; $i < 5; $i++) {
            $newArrivals[$i]->authors = Author::getBookAuthors($newArrivals[$i]->id);
            $newArrivals[$i]->created_at_raw = $newArrivals[$i]->created_at;
            $newArrivals[$i]->created_at = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $newArrivals[$i]->created_at)->diffForHumans();
        }

        return $newArrivals;
    }

    /**
     * Get 5 hot books that are being borrowed in the past month.
     */
    public static function getHotBooks()
    {
        // Subject to change
        // $hotBooks = self::selectRaw('books.id, books.title, books.cover_url, COUNT(transactions.id) as total')
        //     ->leftJoin('transactions', 'books.id', '=', 'transactions.book_id')
        //     ->groupBy('books.id', 'books.title', 'books.cover_url')
        //     ->orderBy('total', 'desc')
        //     ->limit(5)
        //     ->get();

        $sub = Transaction::bookSearchSub();
        $sub2 = self::selectRaw('books.id, books.title, books.cover_url, COUNT(transactions.id) as total')
            ->leftJoin('transactions', 'books.id', '=', 'transactions.book_id')
            ->groupBy('books.id', 'books.title', 'books.cover_url');

        $hotBooks = DB::table( DB::raw("( ". $sub->toSql() .") as sub" ) )
            ->distinct('books.title')
            ->select('books.id', 'books.title', 'books.published_date', 'books.isbn','books.created_at', 'books.copies_owned', 'books.cover_url','sub.copies_used', DB::raw("books.copies_owned - sub.copies_used as copies_left"), 'sub2.total' )
            ->mergeBindings( $sub->getQuery() )
            ->rightJoin('books', 'sub.id', '=', 'books.id')
            ->leftJoinSub( $sub2, 'sub2', function($join){
                $join->on('sub2.id', '=', 'books.id');
            } )
            ->leftJoin('genres', 'books.id', '=', 'genres.book_id')
            ->leftJoin('authors', 'books.id', '=', 'authors.book_id')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        for($i = 0; $i < 5; $i++)
            $hotBooks[$i]->authors = Author::getBookAuthors($hotBooks[$i]->id);

        return $hotBooks;
    }

    public static function search($search, $genre, $status)
    {
        // select distinct `books`.`id`, `books`.`title`, `books`.`published_date`, `books`.`isbn`, `books`.`created_at`, `books`.`copies_owned`, `books`.`cover_url`, `sub`.`copies_used`, books.copies_owned - sub.copies_used as copies_left
        // from (
        //     select `books`.`id`, `books`.`title`, count(transactions.id) as copies_used
        //     from `transactions`
        //     inner join `books` on `transactions`.`book_id` = `books`.`id`
        //     where `transactions`.`status` != 'returned'
        //     group by `books`.`id`) as sub
        // right join `books` on `sub`.`id` = `books`.`id`
        // left join `genres` on `books`.`id` = `genres`.`book_id`
        // left join `authors` on `books`.`id` = `authors`.`book_id`
        // where ((genres.name LIKE '%epic%' AND (books.title LIKE '%edge%' OR books.description LIKE '%edge%')) or (genres.name LIKE '%fantasy%' AND (books.title LIKE '%edge%' OR books.description LIKE '%edge%')))
        //      and (copies_used != copies_owned or copies_used IS NULL)

        $sub = Transaction::bookSearchSub();

        $obj = DB::table( DB::raw("( ". $sub->toSql() .") as sub" ) )
            ->distinct('books.title')
            ->select('books.id', 'books.title', 'books.published_date', 'books.isbn','books.created_at', 'books.copies_owned', 'books.cover_url','sub.copies_used', DB::raw("books.copies_owned - sub.copies_used as copies_left") )
            ->mergeBindings( $sub->getQuery() )
            ->rightJoin('books', 'sub.id', '=', 'books.id')
            ->leftJoin('genres', 'books.id', '=', 'genres.book_id')
            ->leftJoin('authors', 'books.id', '=', 'authors.book_id');

        if($genre)
        {
            $obj->where(function($query) use ($genre, $search){
                for($i = 0; $i < count($genre); $i++)
                {
                    if($i == 0) {
                        $query->where(function($query) use ($genre, $search, $i) {
                            $query->where('genres.name', 'LIKE', '%' . $genre[$i] . '%')
                                ->where(function($query) use ($search) {
                                    $query->where('books.title', 'LIKE', '%' . ($search ? $search : NULL) . '%')
                                        ->orWhere('books.description', 'LIKE', '%' . ($search ? $search : NULL) . '%' );
                                });
                        });
                    }
                    else {
                        $query->orwhere(function($query) use ($genre, $search, $i) {
                            $query->where('genres.name', 'LIKE', '%' . $genre[$i] . '%')
                            ->where(function($query) use ($search) {
                                $query->where('books.title', 'LIKE', '%' . ($search ? $search : NULL) . '%')
                                    ->orWhere('books.description', 'LIKE', '%' . ($search ? $search : NULL) . '%' );
                            });
                        });

                    }
                }
            });
        }
        else if(!$genre)
        {
            $obj->where(function($query) use ($search) {
                $query->where('books.title', 'LIKE', '%' . ($search ? $search : NULL) . '%')
                    ->orWhere('books.description', 'LIKE', '%' . ($search ? $search : NULL) . '%' );
            });
        }

        // Search only books that are available for transaction (borrow)
        if($status == 'available')
        {
            $obj->where(function ($query) {
                $query->whereRaw('copies_used != copies_owned')
                    ->orWhereRaw('copies_used IS NULL');
            });
        }
        $obj = $obj->get();

        // Add authors to json & set NULL cells to 0
        for($i = 0; $i < count($obj); $i++)
        {
            $obj[$i]->authors = Author::getBookAuthors($obj[$i]->id);

            $g = Genre::getBookGenres($obj[$i]->id);
            if(isset($g[0]->genres))
                $obj[$i]->genres = Genre::getBookGenres($obj[$i]->id)[0]->genres;
            else
                $obj[$i]->genres = "none";

            if($obj[$i]->copies_used == NULL)
            {
                $obj[$i]->copies_used = 0;
                $obj[$i]->copies_left = $obj[$i]->copies_owned;
            }

            $obj[$i]->created_at_raw = $obj[$i]->created_at;
            $obj[$i]->created_at = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $obj[$i]->created_at)->diffForHumans();
        }

        // Append other parameters to auto-generated page urls
        if($search) $obj->search = $search;
        if($genre)
        {
            $gc = "";
            for($i = 0; $i < count($genre); $i++)
            {
                $gc .= $genre[$i];
                if($i < count($genre) - 1)
                {
                    $gc .= ", ";
                }
            }
            $obj->genres = $gc;
        }else $obj->genres = "";
        $obj->status = $status;

        return $obj;
    }

    /**
     * Creates or updates a book instance.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book $book or NULL (for create)
     * @return \App\Models\Book
     */
    public static function createOrUpdateBook($request, $book = NULL)
    {
        // Create Book
        if(!isset($book))
        {
            $obj = Book::create([
                'title' => $request->title,
                'description' => $request->description,
                'page_count' => $request->page_count,
                'isbn' => $request->isbn,
                'published_date' => $request->published_date,
                'copies_owned' => $request->copies_owned,
                'cover_url' => $request->cover_url
            ]);

        }
        else
        {
            $obj = Book::where('id', '=', $book->id)
                ->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'page_count' => $request->page_count,
                    'isbn' => $request->isbn,
                    'published_date' => $request->published_date,
                    'copies_owned' => $request->copies_owned,
                    'cover_url' => $request->cover_url
                ]);
        }

        return $obj;
    }

    /**
     * Updates the book authors by deleting and creating updated ones.
     *
     * @param $authorsRaw
     * @param \App\Models\Book $book
     */
    public static function updateAuthors($authorsRaw, $book)
    {
        // Maybe someone can do a better implementation of this.

        $book->authors()->delete();

        // Add authors
        $authors = explode(',', $authorsRaw);
        if((count($authors) == 1 && $authors[0] != '') || count($authors) > 1)
        {
            foreach($authors as $a)
            {
                $book->authors()->create([
                    'name' => $a
                ]);
            }
        }
    }

    /**
     * Updates the book authors by deleting and creating updated ones.
     *
     * @param $genresRaw
     * @param \App\Models\Book $book
     */
    public static function updateGenres($genresRaw, $book)
    {
        // Maybe someone can do a better implementation of this.

        $book->genres()->delete();

        // Add genres
        $genres = explode(',', $genresRaw);
        if((count($genres) == 1 && $genres[0] != '') || count($genres) > 1)
        {
            foreach($genres as $g)
            {
                $book->genres()->create([
                    'name' => $g
                ]);
            }
        }
    }

    /**
     * Deletes a book instance.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book $book or NULL (for create)
     * @return bool|null
     */
    public static function deleteBook($book)
    {
        $book->authors()->delete();
        $book->genres()->delete();
        return $book->delete();
    }


}

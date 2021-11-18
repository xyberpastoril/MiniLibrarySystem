<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

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
        $newArrivals = self::limit(5)->latest()->get();
        for($i = 0; $i < 5; $i++)
            $newArrivals[$i]['authors'] = $newArrivals[$i]->authors()->get();

        // exit( dd($newArrivals[0]['authors'][0]->name) );
        return $newArrivals;
    }

    public static function selectSearch($search)
    {
        return self::where('title', 'LIKE', '%' . ($search ? $search : NULL) . '%' )
            ->paginate(10);
    }
}

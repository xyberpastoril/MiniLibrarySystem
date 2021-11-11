<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->hasOne(Book::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function penalty()
    {
        return $this->belongsTo(Penalty::class);
    }
}

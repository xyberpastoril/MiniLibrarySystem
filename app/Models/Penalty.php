<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'transaction_id',
        'amount',
        'status'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}

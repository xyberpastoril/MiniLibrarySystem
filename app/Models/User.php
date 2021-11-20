<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** Relationships */

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function penalty()
    {
        return $this->belongsTo(Penalty::class);
    }

    public function penalty_payments()
    {
        return $this->hasMany(Penalty_Payments::class);
    }

    /** Functions **/

    /**
     * Select one from User ID.
     */
    public static function selectOne($id)
    {
        return self::where('id', $id)->firstOrFail();
    }

    /**
     * Select paginated from Users
     */
    public static function selectPaginate($search)
    {
        return self::where('first_name', 'LIKE', '%' . ($search ? $search : NULL) . '%' )
            ->orWhere ( 'last_name', 'LIKE', '%' . ($search ? $search : NULL)  . '%' )
            ->orWhere ( 'contact_number', 'LIKE', '%' . ($search ? $search : NULL)  . '%' )
            ->orWhere ( 'email', 'LIKE', '%' . ($search ? $search : NULL)  . '%' )->paginate(10);
    }

    /**
     * Generate unique username for User
     */
    public function generateUsername($firstName, $lastName)
    {
        // Expression to get first name initials
        $expr = '/(?<=\s|^)[a-z]/i';

        // Initialize username variable
        $this->username = "";

        // Get first name initials
        preg_match_all($expr, $firstName, $matches);

        // Concatenate first name initials
        $this->username .= strtolower( implode('', $matches[0]) ) . ".";

        // Concatenate last name without spaces
        foreach( explode(' ', trim( strtolower($lastName) )) as $value)
            $this->username .= $value . "";

        do
        {
            // Generate random number to minimize potential duplicates
            $username = $this->username . rand(100,999);
        } 
        while($this::where('username', '=', $username)->count());

        $this->username = $username;
        $this->save();
    }
}

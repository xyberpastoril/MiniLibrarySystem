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
        'contact_number',
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
}

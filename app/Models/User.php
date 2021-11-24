<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

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
    public static function search($search, $role)
    {
        $obj = self::select(
                'users.id',
                'users.first_name',
                'users.last_name',
                'users.email',
                'users.created_at',
                'model_has_roles.role_id',
                'roles.name',   
            )
            ->join('model_has_roles', 'users.id', '=' ,'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->orderBy('users.last_name', 'ASC')
            ->orderBy('users.first_name', 'ASC');
        
        if($search) 
        {
            $obj->where(function ($query) use ($search) {
                $query->where('first_name', 'LIKE', '%' . ($search ? $search : NULL) . '%' )
                    ->orWhere ( 'last_name', 'LIKE', '%' . ($search ? $search : NULL)  . '%' )
                    ->orWhere ( 'email', 'LIKE', '%' . ($search ? $search : NULL)  . '%' );
            });
        }

        switch($role)
        {
            case 'librarian':
                $obj->where('roles.name', '=', 'Librarian');
                break;
            case 'member':
                $obj->where('roles.name', '=', 'Member');
                break;
        }

        return $obj->paginate(10);
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

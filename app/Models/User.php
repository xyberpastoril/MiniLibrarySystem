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
        'gender',
        'address',
        'cover_url',
        'password',
        'gender',
        'cover_url',
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
                'users.cover_url',
                'users.email',
                'users.gender',
                'users.address',
                DB::raw('users.created_at as joined_date'),
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
            case 'not_librarian':
                $obj->where('roles.name', '!=', 'Librarian');
        }

        // $obj = $obj->paginate(10);
        $obj = $obj->get();

        // Append other parameters to auto-generated page urls
        // if($search) $obj->appends(['search' => $search]);
        // if($role) $obj->appends(['role' => $role]);

        return $obj;
    }

    /**
     * Select all members (including unverified)
     * Query done manually through DB::select due to issues on group by.
     */
    public static function selectAllMembers()
    { 
        // I don't know but this allows the query below to execute.
        DB::statement("SET SQL_MODE=''");

        $results = DB::select('
            select users.id as user_id, users.first_name, users.last_name, users.email, users.created_at as joined_date, users.cover_url, roles.id as role_id, roles.name as role_name, sub.unpaid_penalties, t.in_progress_transactions, l.overdue_returns
            from ( 
                select transactions.user_id, sum(penalties.amount) as unpaid_penalties
                from `penalties` 
                inner join `transactions` on `transactions`.`id` = `penalties`.`transaction_id` 
                where `penalties`.`status` = "unpaid" 
                group by `transactions`.`user_id`) as sub 
            right join `users` on `sub`.`user_id` = `users`.`id` 
            left join (
                select `transactions`.`user_id`, count(transactions.id) as in_progress_transactions 
                from `transactions` 
                where `transactions`.`status` != "returned" 
                group by `transactions`.`user_id`) as `t` on `t`.`user_id` = `users`.`id` 
            left join (
                select transactions.user_id, count(transactions.id) as overdue_returns
                from transactions
                where CURRENT_DATE() > transactions.date_to and transactions.status != "returned"
                group by transactions.user_id) as `l` on `l`.`user_id` = `users`.`id`
            inner join `model_has_roles` on `model_has_roles`.`model_id` = `users`.`id` 
            inner join `roles` on `model_has_roles`.`role_id` = `roles`.`id` 
            where roles.id != 1');
        
        for($i = 0; $i < count($results); $i++)
        {
            $results[$i]->joined_date_raw = $results[$i]->joined_date;
            $results[$i]->joined_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $results[$i]->joined_date)->diffForHumans();
        }

        return $results;
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

    /**
     * Creates or updates a user instance.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user or NULL (for create)
     * @return \App\Models\User
     */
    public static function createOrUpdateUser($request, $user = NULL)
    {
        // Create User
        if(!isset($user))
        {
            $obj = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'email' => $request->email,
                'gender' => $request->gender,
                'address' => $request->address,
                'cover_url' => $request->cover_url
            ]);

        }
        else
        {
            $obj = User::where('id', '=', $user->id)
                ->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'cover_url' => $request->cover_url
                ]);
        }

        return $obj;
    }

    /**
     * Deletes a user instance.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user or NULL (for create)
     * @return bool|null
     */
    public static function deleteUser($user)
    {
        return $user->delete();
    }

}

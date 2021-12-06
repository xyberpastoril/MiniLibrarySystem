<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Construct object. Require admin role to all functions.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // TODO: Require admin role to all functions.
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.users.index", [
            "allUsers" => \App\Models\User::selectAllMembers(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(!\Illuminate\Support\Facades\Auth::user()->hasRole('Librarian')){
            return redirect()->to('/');
        }

        return view("admin.users.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(!\Illuminate\Support\Facades\Auth::user()->hasRole('Librarian')){
            return redirect()->to('/');
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
            'gender' => 'nullable',
            'address' => 'nullable',
            'cover_url' => 'nullable|mimes:jpeg,png,jpg|max:10000',
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        // Unlink existing image if changing or removing image.
        if((isset($request->cover_url) && $user->cover_url) || $request->cover_remove)
        {
            try {
                unlink('media/avatars/'.$user->cover_url);
            }
            catch(\Throwable $e) {}
        }

        // Move image to storage if uploading new ones
        if(isset($request->cover_url)) {
            $request->cover_url->move(public_path('media/avatars/'), $user->id);
        }

        // Include cover_url every update unless removing image.
        if(!$request->cover_remove)
            $request->cover_url = $user->id;

        User::createOrUpdateUser($request, $user);

        return redirect()->to('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!\Illuminate\Support\Facades\Auth::user()->hasRole('Librarian')){
            return redirect()->to('/');
        }

        if ($user->cover_url)
            unlink('media/avatars/'.$user->cover_url);
        return User::deleteUser($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * Allowed only to Admins.
     *
     * @param  \App\Models\User  $user
     * @return Redirect to Users Route
     */
    public function destroyWithRedirect(User $user)
    {
        if(!\Illuminate\Support\Facades\Auth::user()->hasRole('Librarian')){
            return redirect()->to('/');
        }
        
        if ($user->cover_url)
            unlink('media/avatars/'.$user->cover_url);

        User::deleteUser($user);
        return redirect()->to('users');
    }

    /** JSON */

    public function search(Request $request)
    {
        if(\Illuminate\Support\Facades\Auth::user()->hasRole('Librarian'))
            return \App\models\User::search(
                $request->get('search'),
                $request->get('role')
            );
        return redirect()->route('home');
    }

    public function verify(User $user)
    {
        $user->roles()->detach();
        $user->assignRole([2]);
        return 1;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function overview()
    {
        return view('account.overview');
    }

    public function settings()
    {
        return view('account.settings');
    }

    public function updateEmail(Request $request)
    {
        // Check if email already exists
        if(\App\Models\User::where('email', '=', $request->email)->count() && $request->email != auth()->user()->email)
        {
            return [
                'success' => 0,
                'error' => "email_exists"
            ];
        }

        if(\Illuminate\Support\Facades\Hash::check($request->confirmemailpassword, auth()->user()->password))
        {
            \App\Models\User::where('id', '=', \Illuminate\Support\Facades\Auth::user()->id)
            ->update([
                'email' => $request->email
            ]);

            return [
                'success' => 1,
                'error' => null
            ];
        }
        return [
            'success' => 0,
            'error' => "wrong_password"
        ];
    }

    public function updatePassword(Request $request)
    {
        if(!\Illuminate\Support\Facades\Hash::check($request->currentpassword, auth()->user()->password))
        {
            return [
                'success' => 0,
                'error' => 'wrong_password'
            ];
        }

        if($request->newpassword != $request->confirmpassword)
        {
            return [
                'success' => 0,
                'error' => 'passwords_not_match'
            ];
        }

        \App\Models\User::where('id', '=', \Illuminate\Support\Facades\Auth::user()->id)
            ->update([
                'password' => \Illuminate\Support\Facades\Hash::make($request->newpassword)
            ]);

        return [
            'success' => 1,
            'error' => null
        ];
    }

    public function updateBasicInfo(Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        // If user has existing photo
        if((isset($request->avatar) && $user->cover_url) || $request->avatar_remove) 
        {
            try {
                unlink('media/avatars/'.$user->cover_url);
            } catch(\Throwable $e) {}
        }

        \App\Models\User::where('id', '=', $user->id)
            ->update([
                'cover_url' => !$request->avatar_remove ? $user->id : null,
                'address' => $request->address,
            ]);

        if(isset($request->avatar))
        {
            $request->avatar->move(public_path('media/avatars/'), $user->id);
        }

        return redirect('account/settings?basicinfoupdated=1');
    }
}

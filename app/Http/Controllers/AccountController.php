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
        if(\Illuminate\Support\Facades\Hash::check($request->currentpassword, auth()->user()->password))
        {
            if($request->newpassword == $request->confirmpassword)
            {

                return \App\Models\User::where('id', '=', \Illuminate\Support\Facades\Auth::user()->id)
                    ->update([
                        'password' => \Illuminate\Support\Facades\Hash::make($request->newpassword)
                    ]);
            }
            return 0;
        }
        return 0;
    }
}

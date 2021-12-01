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
        if(\Illuminate\Support\Facades\Hash::check($request->confirmemailpassword, auth()->user()->password))
        {
            return \App\Models\User::where('id', '=', \Illuminate\Support\Facades\Auth::user()->id)
            ->update([
                'email' => $request->email
            ]);
        }
        return 0;
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

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User as Model;
use App\Models\User;

class LoginController2 extends Controller
{

    public function authentication(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // $user = User::where('email', $request->only('email'))->first();

        if(!Auth::attempt($credentials)) {
            return redirect()->back()->with(['error' => 'These credentials do not match our record']); 
        }
        
        $user = auth()->user();

        if($user->isVerified) {
            return redirect('/profile');
        } else {
            return redirect('/email/verify');
        }
        // if (Auth::attempt($credentials) && $user->isVerified == 1) {
        //     return redirect('/profile');
        // } else {
        //     return redirect()->back()->with(['error' => 'These credentials do not match our record']);
        // }
    }
}
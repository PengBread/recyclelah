<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User as Model;

class LoginController2 extends Controller
{

    public function authentication(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/profile');
        } else {
            return redirect()->back()->with(['error' => 'These credentials do not match our record']);
        }
    }

    public function userLogin(Request $request)
    {
        Auth::login(Model::all()->last());
        return Redirect("http://127.0.0.1:8000/profile");
    }
}

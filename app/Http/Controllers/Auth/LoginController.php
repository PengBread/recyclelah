<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User as Model;
use App\Models\User;

class LoginController extends Controller
{

    public function authentication(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //Check if credentials exist in database
        if(!Auth::attempt($credentials)) {
            return redirect()->back()->with(['error' => 'Invalid email or password']); 
        }
        
        //Gets user account
        $user = auth()->user();

        //Check if user is verified or not verified.
        if($user->isVerified) {
            return redirect('/profile');
        } else {
            return redirect('/email/verify');
        }
    }
}
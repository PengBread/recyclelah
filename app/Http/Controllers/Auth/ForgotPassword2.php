<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Models\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Route;
use App\Mail\ResetPasswordEmail;

class ForgotPassword2 extends Controller
{

    public function forgotPassword()
    {
        return view('auth.reset');
    }

    public function sendResetPassword(Request $request)
    {
        //$userEmail = User::whereEmail($request->email)->first();
        $user = User::where('email',$request->email)->first();

        if ($user == null || $user->isVerified == 0) {
            return redirect()->back()->with(['error' => 'Email not exists']);
        }

        $body = [
            'name' => $user->name,
            'url' => 'http://127.0.0.1:8000/resetPassword',
        ];

        Mail::to($user->email)
            ->send(new ResetPasswordEmail($body));

        // $data = [$userEmail->email];

        // Mail::send('auth.emailResetPassword', $data, function ($message) use ($data) {
        //     $message->to($data[0]);
        //     $message->subject('Recycle-Lah - Reset Password');
        // });

        return redirect()->back()->with(['success' => 'Reset code sent to your email']);
    }

    public function resetPassword()
    {
        return view('auth.passwords.reset');
    }

    public function updatePassword(Request $request)
    {

        $user = User::whereEmail($request->email)->first();

        if (($user) == null) {
            return redirect()->back()->withErrors(['email' => 'Email not exists']);
        }

        $userPassword = [Input::get('password')];

        $rules = array(
            'password' => 'required|string|min:8|confirmed'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user->password = Hash::make($userPassword[0]);
            $user->save();
            return view('auth.updatePasswordSuccessful');
        }
    }
}
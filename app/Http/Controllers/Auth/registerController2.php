<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User as Model;
use App\Models\Organization;
use Illuminate\Support\Str;
use Mail;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\ActivationMail;
use Illuminate\Support\Facades\Validator;

class registerController2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        //if user choose household/worker radio button
        if ($request->flexRadioDefault == 'household_worker') {
            $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users',
                'phoneNumber' => 'required|regex:/(6?01)[0-9]{8,10}/|unique:users',
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/[a-zA-Z]/',
                    'regex:/[0-9]/',
                ],
                'password-confirm' => 'required|same:password'
            ]);

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phoneNumber' => $request->input('phoneNumber'),
                'status' => 'verifying',
                'password' => Hash::make($request->input('password')),
            ]);
        }
        //if user choose organization radio button 
        else {
            $request->validate([
                'organizationName' => 'required|string|max:50',
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users',
                'phoneNumber' => 'required|regex:/(6?01)[0-9]{8,9}/|unique:users',
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/[a-zA-Z]/',
                    'regex:/[0-9]/',
                ],
                'password-confirm' => 'required|same:password'
            ]);

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phoneNumber' => $request->input('phoneNumber'),
                'status' => 'verifying',
                'password' => Hash::make($request->input('password')),
            ]);
            $organization = Organization::create([
                'userID' => $user->userID,
                'organizationName' => $request->input('organizationName'),
                'organizationCode' => Str::random(7)
            ]);

            $user->organizationID = $organization->organizationID;
            $user->save();
        }

        $body = [
            'name' => $request->input('name'),
            'url' => route('verification', ['id' => $user->userID]),
        ];

        Mail::send(new ActivationMail($body));

        return redirect('/email/verify');
    }

    //Used to set verified
    public function verified(Request $request) {
        Model::where('userID', $request->id)
            ->update(['isVerified' => true, 'status' => 'active']);

        return redirect()->route('login')->with('success', 'Verification Successful');
    }

    //Used to resend email verification
    public function sendEmail(){
        $user = auth()->user();
        $body = [
            'name' => $user->name,
            'url' => route('verification', ['id' => $user->userID]),
        ];

        Mail::send(new ActivationMail($body));
        
        return redirect()->back()->with(['email' => 'Email sent successfully']);
    }
}
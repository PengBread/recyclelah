<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateValidationRequest;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Support\Str;
use Mail;
use Auth;

class registerController2 extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if user choose household/worker radio button
        if ($request->flexRadioDefault == 'household_worker') {
            $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users',
                'phoneNumber' => 'required|regex:/(6?01)[0-9]{8,9}/|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phoneNumber' => $request->input('phoneNumber'),
                'password' => $request->input('password')
            ]);
        }
        //if user choose organization radio button 
        else {
            $request->validate([
                'organizationName' => 'required|string|max:50',
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users',
                'phoneNumber' => 'required|regex:/(6?01)[0-9]{8,9}/|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phoneNumber' => $request->input('phoneNumber'),
                'password' => $request->input('password')
            ]);
            $organization = Organization::create([
                'userID' => $user->userID,
                'organizationName' => $request->input('organizationName'),
                'organizationCode' => Str::random(5)
            ]);

            $user->organizationID = $organization->organizationID;
            $user->save();
        }

        $input = [
            $request->input('name'),
            $request->input('email'),
            $request->input('phoneNumber'),
            $request->input('password')
        ];

        Mail::send('auth.emailActivation', $input, function ($message) use ($input) {
            $message->to($input[1]);
            $message->subject('Recycle-Lah - Activation Code');
        });

        return redirect('/email/verify');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

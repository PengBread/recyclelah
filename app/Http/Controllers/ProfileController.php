<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile(Request $request) {
        $user = auth()->user();
        return view('profile', ['userInfo'=>$user]);
    }

    public function organization(Request $request) {
        $user = auth()->user();
        if($user->organizationID != null) {
            $data = Organization::find($request->organizationID);

            return view('profileOrg', ['userInfo'=>$data]);
        } else {
            return view('profileOrg');
        }
    }

    public function editName(ProfileRequest $request) {
        $array = $request->safe()->only(['name']);
        auth()->user()->update($array);
        
        return redirect()->route('authProfile');
    }

    public function editPhone(ProfileRequest $request) {
        $array = $request->safe()->only(['phoneNumber']);
        auth()->user()->update($array);

        return redirect()->route('authProfile');
    }

    public function editPassword(ProfileRequest $request) {
        // auth()->user()->password = Hash::make($request->safe()->password);
        auth()->user()->update(['password' => Hash::make($request->safe()->password)]);

        return redirect()->route('authProfile');
    }
}

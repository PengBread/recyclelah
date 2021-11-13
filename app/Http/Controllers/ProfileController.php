<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Models\Organization;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;

class ProfileController extends Controller
{

    public function profile(Request $request) {
        $user = auth()->user();
        return view('profile', ['userInfo' => $user]);
    }

    public function organization(Request $request) {
        
        return view('profileOrg', ['organizationInfo' => auth()->user()->affiliate]);
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
        auth()->user()->update(['password' => Hash::make($request->safe()->password)]);

        return redirect()->route('authProfile');
    }

    public function joinOrganization(ProfileRequest $request) {
        $code = $request->safe()->code;

        $table = Organization::select('organizationID')
                ->where('organizationCode', '=', $code)
                ->first();
        if ($table == null) {
            return redirect()->route('organization')->withErrors([
                'invalidCodeError' => 'Invalid Code. No organization is under this code!'
            ]);
        }

        auth()->user()->update(['organizationID' => $table->organizationID]);

        return redirect()->route('organization');

        // $table = DB::table('organizations')
        //                     ->select('organizationID')
        //                     ->where('organizationCode', '=', $code)
        //                     ->get();
    }

    public function leaveOrganization(Request $request) {
        auth()->user()->update(['organizationID' => null]);

        return redirect()->route('authProfile');
    }

    public function listUsers(Request $request) {
        $organization = auth()->user()->affiliate;
        $page = ($request->page) ?? 1;
        $staffs = $organization
                ->staffs()
                ->where('userID', '!=', $organization->userID)     // exclude owner
                ->offset(8*($page - 1))
                ->limit(8)
                ->get();
        
        $total = $organization
                ->staffs()
                ->where('userID', '!=', $organization->userID)     // exclude owner
                ->count();
        
        return view('affiliatesList', ['userOrg' => $staffs, 'total' => $total, 'page' => $page]);
    }

    public function kickUser(Request $request, User $kicked) {
        $kicked->update(['organizationID' => null]);
        
        return redirect()->route('memberList');
    }

    public function refreshCode(Request $request) {
        $organization = auth()->user()->affiliate;

        Organization::where('organizationID', $organization->organizationID)
                    ->update(['organizationCode' => Str::random(7)]);

        return redirect()->route('organization');
    }

    // public function createSchedule(Request $request) {
    //     $request->validate([
    //         'scheduleTitle' => 'required|string|max:50',
    //         'scheduleDateStart' => 'required|string|max50',
    //         'scheduleDateEnd' => 'required|string|max:50',
    //         'scheduleContent'=>'required|string|max:50'
    //     ]);

    //     $stateSelection = $request->get('scheduleState');
    //     $catSelection = $request->get('scheduleCategory');

    //     // if ($stateSelection == 'Select a State'){
    //     //     return redirect()->back()->withErrors(['scheduleState' => 'Select a state'])->withInput();
    //     // }

    //     // if ($catSelection == 'Select a Catagory'){
    //     //     return redirect()->back()->with(['scheduleCategory' => 'Select a catagory'])->withInput();
    //     // }

    //     $organization = auth()->user()->affiliate;
    //     Schedule::create([
    //         'organizationID'=>$organization->organizationID,
    //         'scheduleName' => $request->input('scheduleTitle'),
    //         'stateName'=>$stateSelection,
    //         'scheduleDateStart' => $request->input('scheduleDateStart'),
    //         'scheduleDateEnd' => $request->input('scheduleDateEnd'),
    //         'scheduleContent' =>$request->input('scheduleContent'),
    //         'recyclingCategory'=>$catSelection,
    //     ]);

    //     return redirect()->route('organization')->with('success', 'Schedule created.');
    // }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organization;
use App\Models\MapPointer;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index(Request $request)
    {
        //display everything at the beginning
        $category = Schedule::select('recyclingCategory')->groupBy('recyclingCategory')->get();

        $organizationName = Organization::join('schedules', 'schedules.organizationID', '=', 'organizations.organizationID')
            ->orderBy('organizations.organizationName')
            ->groupBy('organizations.organizationName')
            ->get('organizations.organizationName');

        $schedules = Schedule::all()->toJson();
        $schedules = json_decode($schedules);

        return view('schedule', ['category' => $category, 'organization' => $organizationName,'schedules' => $schedules]);
    }

    public function display(Request $request)
    {
        $category = Schedule::select('recyclingCategory')->groupBy('recyclingCategory')->get();

        $organization = Organization::all();

        $catSelection = $request->catScheduleSelection;
        $stateSelection = $request->stateScheduleSelection;
        $orgSelection = $request->orgScheduleSelection;
        $dateSelection = $request->dateScheduleSelection;

        $schedules = Schedule::query();

        if($catSelection != null) {
            $schedules->where('recyclingCategory', $catSelection);
        }
        if($stateSelection != null) {
            $schedules->where('stateName', $stateSelection);
        }
        if($orgSelection != null) {
            $schedules->where('organizationID', $orgSelection);
        }
        if($dateSelection != null) {
            $schedules->whereDate('scheduleDateStart', '=', $dateSelection);
        }
        
        $filtered = $schedules->get();

        return view('schedule', ['category' => $category, 'organization' => $organization, 'schedules' => $filtered]);
    }

    public function joinSchedule(Request $request) {
        if(!auth()->user()->pointer) {
            return redirect()->route('schedules')->withErrors(['noPointer' => 'You do not have a location selected. Please select your household location before joining a schedule!']);
        } else {
            auth()->user()->pointer->update(['scheduleID' => $request->sch]);
            return redirect()->route('schedules')->with('success', 'Successfully joined a schedule');
        }
    }
}

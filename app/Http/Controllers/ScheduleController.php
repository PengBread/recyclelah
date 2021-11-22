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

    public function index(Request $request) {
        $category = Schedule::select('recyclingCategory')->groupBy('recyclingCategory')->get();

        $organization = Organization::select('organizationID', 'organizationName')->get();

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
        }

        $pointer = auth()->user()->pointer;
        $schedule = Schedule::where('scheduleID', $pointer->scheduleID)->first();
        
        if($pointer->scheduleID != null && Carbon::parse($schedule->scheduleDateStart)->isSameDay(today())) {
            return redirect()->route('schedules')->withErrors(['error' => 'You are not allowed to leave this schedule because the schedule is already started. Please wait until the schedule ends.']);
        } 

        auth()->user()->pointer->update(['scheduleID' => $request->sch]);
        return redirect()->route('schedules')->with('success', 'Successfully joined a schedule');
    }

    public function leaveSchedule(Request $request) {
        if(!auth()->user()->pointer) {
            return redirect()->route('schedules')->withErrors(['noPointer' => 'You do not have a location selected. Please select your household location before joining a schedule!']);
        } else {

            auth()->user()->pointer->update(['scheduleID' => null]);
            return redirect()->route('schedules')->with('success', 'Successfully left the schedule!');
        }
    }
}

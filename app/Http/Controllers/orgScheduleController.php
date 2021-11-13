<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organization;
use App\Models\MapPointer;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class orgScheduleController extends Controller
{
    public function index(Request $request)
    {
        //display everything at the beginning
        $organization = auth()->user()->affiliate;
        $page = ($request->page) ?? 1;


        // $organizationName = Organization::join('schedules', 'schedules.organizationID', '=', 'organizations.organizationID')
        //     ->orderBy('organizations.organizationName')
        //     ->groupBy('organizations.organizationName')
        //     ->get('organizations.organizationName');

        $schedules = Schedule::select('*')
                    ->where('organizationID', $organization->organizationID)
                    ->offset(8*($page - 1))
                    ->limit(8)
                    ->orderBy('scheduleStatus', 'desc')
                    ->orderBy('scheduleDateStart', 'asc')
                    ->get();

        $total = Schedule::select('*')
                ->where('organizationID', $organization->organizationID)
                ->count();

        return view('orgSchedule', ['schedules' => $schedules, 'total' => $total, 'page' => $page]);
    }

    public function updateSchedule(Request $request) {
        $startDate = $request->scheduleDateStart;
        $hours = $request->scheduleDateEnd;

        $request->validate([
            'scheduleTitle' => 'required|string|max:50',
            'scheduleDateStart' => 'required|date',
            'scheduleDateEnd' => 'required',
            // 'scheduleDateEnd' => 'required|date|after:'.$startDate,
            'scheduleContent'=>'required|string|max:500'
        ]);

        $target = $request->schedule;

        Schedule::where('scheduleID', $target)
                ->update(['scheduleName' => $request->scheduleTitle, 'stateName' => $request->scheduleState, 'recyclingCategory' => $request->recyclingCategory, 
                        'scheduleDateStart' => $request->scheduleDateStart, 'scheduleDateEnd' => Carbon::parse($startDate)->addHours($hours), 'scheduleContent' => $request->scheduleContent]);

        return redirect()->route('orgSchedule.schedules');

    }

    public function deleteSchedule(Request $request) {
        $target = $request->schedule;
        
        $schedule = Schedule::where('scheduleID', $target)
                    ->delete();
        
        return redirect()->route('orgSchedule.schedules');
    }

    public function createSchedule(Request $request) {
        $startDate = $request->scheduleDateStart;
        $hours = $request->scheduleDateEnd;

        $request->validate([
            'scheduleTitle' => 'required|string|max:50',
            'scheduleDateStart' => 'required|date',
            'scheduleDateEnd' => 'required',
            'scheduleContent'=>'required|string|max:500'
        ]);

        $stateSelection = $request->get('scheduleState');
        $catSelection = $request->get('recyclingCategory');
        
        $organization = auth()->user()->affiliate;
        Schedule::create([
            'organizationID'=>$organization->organizationID,
            'scheduleName' => $request->input('scheduleTitle'),
            'stateName'=>$stateSelection,
            'scheduleDateStart' => $request->input('scheduleDateStart'),
            'scheduleDateEnd' => Carbon::parse($startDate)->addHours($hours),
            'scheduleContent' =>$request->input('scheduleContent'),
            'recyclingCatagory'=>$catSelection,
            'scheduleStatus' => true,
        ]);
        return redirect()->route('orgSchedule.schedules')->with('success', 'Successfully create a new Schedule.');
    }

    // public function display(Request $request)
    // {
    //     $category = Schedule::select('recyclingCategory')->groupBy('recyclingCategory')->get();

    //     $catSelection = $request->catScheduleSelection;
    //     $stateSelection = $request->stateScheduleSelection;
    //     $dateSelection = $request->dateScheduleSelection;

    //     $schedules = Schedule::query();

    //     if($catSelection != null) {
    //         $schedules->where('recyclingCategory', $catSelection);
    //     }
    //     if($stateSelection != null) {
    //         $schedules->where('stateName', $stateSelection);
    //     }
    //     if($dateSelection != null) {
    //         $schedules->whereDate('scheduleDateStart', '=', $dateSelection);
    //     }
        
    //     $filtered = $schedules->get();

    //     return view('orgSchedule', ['category' => $category, 'schedules' => $filtered]);
    // }
}
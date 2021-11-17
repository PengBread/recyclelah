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
        $target = $request->schedule;
        // dd($request->recyclingCategory);

        Schedule::where('scheduleID', $target)
                ->update([
                    'scheduleName' => $request->scheduleTitle, 
                    'stateName' => $request->scheduleState, 
                    'recyclingCategory' => $request->recyclingCategory, 
                    'scheduleDateStart' => $request->scheduleDateStart, 'scheduleDateEnd' => $request->scheduleDateEnd, 'scheduleContent' => $request->scheduleContent]);

        return redirect()->route('orgSchedule.schedules');

    }

    public function deleteSchedule(Request $request) {
        $target = $request->schedule;
        
        $schedule = Schedule::where('scheduleID', $target)
                    ->delete();
        
        return redirect()->route('orgSchedule.schedules');
    }

    public function createSchedule(Request $request) {

        $request->validate([
            'scheduleTitle' => 'required|string|max:50',
            'scheduleDateStart' => 'required|string|max:50',
            'scheduleDateEnd' => 'required|string|max:50',
            'scheduleContent'=>'required|string|max:500',
        ]);

        $stateSelection = $request->get('scheduleState');
        $catSelection = $request->get('scheduleCategory');

        // if ($stateSelection == 'Select a State'){
        //     return redirect()->back()->withErrors(['scheduleState' => 'Please select a state'])->withInput();
        // } else if ($catSelection == 'Select a Category'){
        //     return redirect()->back()->withErrors(['scheduleCategory' => 'Please select a category'])->withInput();
        // } else {
            $organization = auth()->user()->affiliate;
            Schedule::create([
                'organizationID'=>$organization->organizationID,
                'scheduleName' => $request->input('scheduleTitle'),
                'stateName'=>$stateSelection,
                'scheduleDateStart' => $request->input('scheduleDateStart'),
                'scheduleDateEnd' => $request->input('scheduleDateEnd'),
                'scheduleContent' =>$request->input('scheduleContent'),
                'recyclingCategory'=>$catSelection,
                'scheduleStatus' => true,
            ]);
            return redirect()->route('orgSchedule.schedules')->with('success', 'Successfully create a new Schedule.');
        //}
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
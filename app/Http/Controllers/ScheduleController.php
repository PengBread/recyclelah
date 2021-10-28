<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function getSchedules(){
        $schedules= DB::select('SELECT scheduleName, stateName, scheduleDate, scheduleTimeStart FROM schedules');
        return view('schedule', ['schedules'=>$schedules]);
    }

    // public function scheduleFilters(Request $request){
    //     $name=DB::table('schedules')->select('scheduleName')->distinct()->get()->pluck('scheduleName')->sort();
    //     $state=DB::table('schedules')->select('stateName')->distinct()->get()->pluck('stateName');
    //     $date=DB::table('schedules')->select('scheduleDate')->distinct()->get()->pluck('scheduleDate');
    //     $time=DB::table('schedules')->select('scheduleTimeStart')->distinct()->get()->pluck('scheduleTimeStart');

    //     return view('schedule', [
    //         'scheduleName'=>$name,
    //         'stateName'=>$state,
    //         'scheduleDate'=>$date,
    //         'scheduleTimeStart'=>$time
    //         // one more hting here
    //     ]);
    // }

}

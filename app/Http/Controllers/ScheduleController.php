<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function schedules(Request $request)
    {
        return view('schedule');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organization;
use App\Models\MapPointer;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RankingsController extends Controller
{
    public function displayRankings(Request $request) {
        $rankList = User::select('*') 
                    ->limit(10)
                    ->orderBy('points', 'DESC')
                    ->get();
        
        $count = 1;

        return view('rankings', ['rankList' => $rankList, 'count' => $count]);
    }
}

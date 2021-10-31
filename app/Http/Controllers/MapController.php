<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organization;
use App\Models\MapPointer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function mapPage(Request $request) {
        if(!auth()->user()->pointer) {
            return view('map');
        } else {
            $user = auth()->user()->pointer;

            return view('map', ['userInfo' => $user]);
        }
    }

    public function addLocation(Request $request) {
        //save location
        if(!auth()->user()->pointer) {
            $create =
            MapPointer::create([
                'longitude' => $request->lng,
                'latitude' => $request->lat,
                'pointerAddress' => $request->placeInfo,
                'pointerStatus' => 'Active',
                'recycleCategory' => 'Paper',
            ]);
        } else {
<<<<<<< HEAD
            auth()->user()->pointer->update(['pointerAddress' => $request->placeInfo, 'longitude' => $request->lng, "latitude" => $request->lat], ['recycleCategory' => 'Paper']);
=======
            auth()->user()->pointer->update(['pointerAddress' => $request->placeInfo], ['longitude' => $request->lng], ["latitude" => $request->lat], ['recycleCategory' => 'Paper']);
>>>>>>> a0d6cf85c11201d2128d06067cd1a218fac1b326
        }

        return redirect()->route('map');
    }

    public function listLocation(Request $request) {
        //load all location
        $user = auth()->user()->pointer;

        return view('map', ['userMarker' => $user]);
    }
}

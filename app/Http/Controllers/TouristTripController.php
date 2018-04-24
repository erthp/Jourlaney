<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\TouristTrip;

class TouristTripController extends Controller
{
    public function touristrip(Request $request){
        //$username = $request->input('username');
        $queryTouristTrip = DB::insert("insert into TouristTrip(tripId,tripName,tripLocation,tripDetails,tripDate,touristId) values(?,?,?,?,?,?)",[$username,$request->input('password'),$request->input('firstname'),$request->input('lastname'),$request->input('email'),$request->input('gender'),$request->input('birthdate'),$request->input('idcard')]);
        $queryTourist = DB::insert("insert into Tourist(username) value(?)",[$request->input('username')]);
        return view('registercompleted');
    }
}

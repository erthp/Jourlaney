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
        $queryTouristTrip = DB::insert("insert into TouristTrip(tripName,tripLocation,tripDetails,tripDate,touristId) values(?,?,?,?,?)",[$request->input('tripname'),$request->input('location'),$request->input('date'),$request->input('file_source'),$request->input('transportation'),$request->input('max-traveller'),$request->input('language'),$request->input('trip-conditions'),$request->input('trip-details')]);
        return view('createtripcompleted');
    }
}

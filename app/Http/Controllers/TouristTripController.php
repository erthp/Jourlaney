<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\TouristTrip;

class TouristTripController extends Controller
{
    public function tcreatetrip(Request $request){
        $lastTripId = DB::select("select tripId from TouristTrip order by tripId desc limit 1");
        $tripIdObj = $lastTripId[0]->tripId;
        $tripId = $tripIdObj+1;

        $touristTripImage = $request->file('trippic');
        $input['filename'] = time().'.'.$touristTripImage->getClientOriginalExtension();
        $imagePath = public_path('/images/trippic');
        $touristTripImage->move($imagePath, $input['filename']);
        $touristTripPicName = $input['filename'];

        $queryTouristTrip = DB::insert("insert into TouristTrip(tripId,tripName,tripStart,tripEnd,tripPicture,touristId) values(?,?,?,?,?,?)",[$tripId,$request->input('tripname'),$request->input('startdate'),$request->input('enddate'),$touristTripPicName,$request->input('touristid')]);
        
        if(!empty($request->input('location'))){
            $queryLocation1 = DB::insert("insert into TouristTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location')]);
            if(!empty($request->input('location2'))){
                $queryLocation2 = DB::insert("insert into TouristTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location2')]);
                if(!empty($request->input('location3'))){
                    $queryLocation3 = DB::insert("insert into TouristTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location3')]);
                }
            }
        }
        return view('createtripcompleted');
    }
}
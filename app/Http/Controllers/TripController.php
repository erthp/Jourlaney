<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class TripController extends Controller
{
    public function showGuideTrip($tripId){
        $tripData = DB::table('GuideTrip')->where(['tripId'=>$tripId])->first();
        $creatorId = DB::table('GuideTrip')->select('guideId')->where(['tripId'=>$tripId])->first();
        $value = Current($creatorId);
        $creatorName = DB::select("select Users.userFirstName from Users join Guide on Users.username = Guide.username join GuideTrip on Guide.guideId = GuideTrip.guideId where GuideTrip.guideId = ".$value);
        return view('Trip', ['trip' => $tripData], ['creatorName' => $creatorName[0]]);
    }
}

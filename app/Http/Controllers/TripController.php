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
        return view('GuideTrip', ['trip' => $tripData], ['creatorName' => $creatorName[0]]);
    }

    public function showTouristTrip($tripId){
        $tripData = DB::table('TouristTrip')->where(['tripId'=>$tripId])->first();
        $creatorId = DB::table('TouristTrip')->select('touristId')->where(['tripId'=>$tripId])->first();
        $value = Current($creatorId);
        $creatorName = DB::select("select Users.userFirstName from Users join Toursit on Users.username = Tourist.username join TouristTrip on Tourist.touristId = TouristTrip.touristId where TouristTrip.touristId = ".$value);
        return view('TouristTrip', ['trip' => $tripData], ['creatorName' => $creatorName[0]]);
    }

    public function gdeletetrip(Request $request){
        $tripId = $request->input('tripId');
        $delete = DB::delete("delete from GuideTrip where tripId = ".$tripId);
        echo "<script>window.alert('Trip Deleted.')</script>";
        return view('index');
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class TripController extends Controller
{
    public function showGuideTrip($tripId){
        $tripData = DB::table('GuideTrip')->where(['tripId'=>$tripId])->first();
        $tripTransportation = DB::select("select t.tripTransportation from GuideTripTransportation t join GuideTrip g on g.tripId = t.tripId where t.tripId = " .$tripId);

        $tripCondition = DB::select("select c.tripCondition from GuideTripCondition c join GuideTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);

        $creatorId = DB::table('GuideTrip')->select('guideId')->where(['tripId'=>$tripId])->first();
        $tripLocation = DB::select("select l.tripLocation from GuideTripLocation l join GuideTrip g on g.tripId = l.tripId where l.tripId = " .$tripId);
        $tripCost = DB::table('GuideTrip')->select('tripCost')->where(['tripId'=>$tripId])->first();
        $value = Current($creatorId);
        $creatorName = DB::select("select Users.userFirstName from Users join Guide on Users.username = Guide.username join GuideTrip on Guide.guideId = GuideTrip.guideId where GuideTrip.guideId = ".$value);
        //dd($tripLocation);
        return view('GuideTrip', ['creatorName' => $creatorName[0]], ['trip' => $tripData], ['tripCost' => $tripCost], ['tripLocation' => $tripLocation], ['tripCondition' => $tripCondition], ['tripTransportation' => $tripTransportation]);
    }

    public function showTouristTrip($tripId){
        $tripData = DB::table('TouristTrip')->where(['tripId'=>$tripId])->first();
        $creatorId = DB::table('TouristTrip')->select('touristId')->where(['tripId'=>$tripId])->first();
        $value = Current($creatorId);
        $creatorName = DB::select("select Users.userFirstName from Users join Tourist on Users.username = Tourist.username join TouristTrip on Tourist.touristId = TouristTrip.touristId where TouristTrip.touristId = ".$value);
        return view('TouristTrip', ['trip' => $tripData], ['creatorName' => $creatorName[0]]);
    }

    public function gdeletetrip(Request $request){
        $tripId = $request->input('tripId');
        $delete = DB::delete("delete from GuideTrip where tripId = ".$tripId);
        echo "<script>window.alert('Trip Deleted.')</script>";
        return view('index');
    }

    public function tdeletetrip(Request $request){
        $tripId = $request->input('tripId');
        $delete = DB::delete("delete from TouristTrip where tripId = ".$tripId);
        echo "<script>window.alert('Trip Deleted.')</script>";
        return view('index');
    }
    
}

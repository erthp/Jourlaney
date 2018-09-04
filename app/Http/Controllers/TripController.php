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
        $tripDetails = DB::select("select d.tripDay, d.tripTime, d.tripDescription from GuideTripDetails d join GuideTrip g on g.tripId = d.tripId where d.tripId = " .$tripId);
        $value = Current($creatorId);
        $creator = DB::select("select * from Users join Guide on Users.username = Guide.username join GuideTrip on Guide.guideId = GuideTrip.guideId where GuideTrip.tripId = ".$tripId);
        return view('GuideTrip', ['creator' => $creator[0]], ['trip' => $tripData], ['tripCost' => $tripCost])->with('tripLocation',$tripLocation)->with('tripTransportation',$tripTransportation)->with('tripCondition',$tripCondition)->with('tripDetails',$tripDetails);
    }

    public function showTouristTrip($tripId){
        $tripData = DB::table('TouristTrip')->where(['tripId'=>$tripId])->first();
        $creatorId = DB::table('TouristTrip')->select('touristId')->where(['tripId'=>$tripId])->first();
        $tripLocation = DB::select("select l.tripLocation from TouristTripLocation l join TouristTrip t on t.tripId = l.tripId where l.tripId = " .$tripId);
        $value = Current($creatorId);
        $creator = DB::select("select Users.userFirstName from Users join Tourist on Users.username = Tourist.username join TouristTrip on Tourist.touristId = TouristTrip.touristId where TouristTrip.touristId = ".$value);
        return view('TouristTrip', ['creator' => $creator[0]], ['trip' => $tripData], ['tripLocation',$tripLocation]);
    }
    
    public function guideShowEditTrip($tripId){
        $tripData = DB::table('GuideTrip')->where(['tripId'=>$tripId])->first();
        $creatorId = DB::table('GuideTrip')->select('guideId')->where(['tripId'=>$tripId])->first();
        $value = Current($creatorId);
        $creator = DB::select("select * from Users join Guide on Users.username = Guide.username join GuideTrip on Guide.guideId = GuideTrip.guideId where GuideTrip.tripId = ".$tripId);
        return view('GuideEditTrip', ['creator' => $creator[0]], ['trip' => $tripData]);
    }

    public function guideShowEditTripDetails($tripId){
        $tripData = DB::table('GuideTrip')->where(['tripId'=>$tripId])->first();
        $creatorId = DB::table('GuideTrip')->select('guideId')->where(['tripId'=>$tripId])->first();
        $value = Current($creatorId);
        $creator = DB::select("select * from Users join Guide on Users.username = Guide.username join GuideTrip on Guide.guideId = GuideTrip.guideId where GuideTrip.tripId = ".$tripId);
        $tripTransportation = DB::select("select t.tripTransportation from GuideTripTransportation t join GuideTrip g on g.tripId = t.tripId where t.tripId = " .$tripId);
        $tripCondition = DB::select("select c.tripCondition from GuideTripCondition c join GuideTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);
        $creatorId = DB::table('GuideTrip')->select('guideId')->where(['tripId'=>$tripId])->first();
        $tripLocation = DB::select("select l.tripLocation from GuideTripLocation l join GuideTrip g on g.tripId = l.tripId where l.tripId = " .$tripId);
        dd($tripTransportation);
        return view('GuideEditTripDetails', ['creator' => $creator[0]], ['trip' => $tripData])->with('tripLocation',$tripLocation)->with('tripTransportation',$tripTransportation)->with('tripCondition',$tripCondition);
    }

    public function touristShowEditTrip($tripId){
        $tripData = DB::table('TouristTrip')->where(['tripId'=>$tripId])->first();
        $creatorId = DB::table('TouristTrip')->select('touristId')->where(['tripId'=>$tripId])->first();
        $value = Current($creatorId);
        $creator = DB::select("select * from Users join Tourist on Users.username = Tourist.username join TouristTrip on Tourist.touristId = TouristTrip.touristId where TouristTrip.tripId = ".$tripId);
        return view('TouristEditTrip', ['creator' => $creator[0]], ['trip' => $tripData]);
    }

    public function gdeletetrip(Request $request){
        $tripId = $request->input('tripId');
        $deleteTrip = DB::delete("delete from GuideTrip where tripId = ".$tripId);
        $deleteTripCondition = DB::delete("delete from GuideTripCondition where tripId = ".$tripId);
        $deleteTripDetails = DB::delete("delete from GuideTripDetails where tripId = ".$tripId);
        $deleteTripLocation = DB::delete("delete from GuideTripLocation where tripId = ".$tripId);
        $deleteTripTransportation = DB::delete("delete from GuideTripTransportation where tripId = ".$tripId);
        echo "<script>window.alert('Trip Deleted.')</script>";
        return view('index');
    }

    public function tdeletetrip(Request $request){
        $tripId = $request->input('tripId');
        $deleteTrip = DB::delete("delete from TouristTrip where tripId = ".$tripId);
        $deleteTripCondition = DB::delete("delete from TouristTripCondition where tripId = ".$tripId);
        $deleteTripLocation = DB::delete("delete from TouristTripLocation where tripId = ".$tripId);
        $deleteTripTransportation = DB::delete("delete from TouristTripTransportation where tripId = ".$tripId);
        echo "<script>window.alert('Trip Deleted.')</script>";
        return view('index');
    }
    
}

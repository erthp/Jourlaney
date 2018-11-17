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
        $guideId = $creatorId->guideId;

        
        return view('GuideTrip', ['creator' => $creator[0]], ['trip' => $tripData])->with('tripCost',$tripCost)->with('tripLocation',$tripLocation)->with('tripTransportation',$tripTransportation)->with('tripCondition',$tripCondition)->with('tripDetails',$tripDetails)->with('guideId',$guideId);
    }

    public function showTouristTrip($tripId){
        $tripData = DB::table('TouristTrip')->where(['tripId'=>$tripId])->first();
        $creatorId = DB::table('TouristTrip')->select('touristId')->where(['tripId'=>$tripId])->first();
        $tripLocation = DB::select("select l.tripLocation from TouristTripLocation l join TouristTrip t on t.tripId = l.tripId where l.tripId = " .$tripId);
        $tripCondition = DB::select("select c.tripCondition from TouristTripCondition c join TouristTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);
        $tripDetails = DB::select("select d.tripDay, d.tripTime, d.tripDescription from TouristTripDetails d join TouristTrip t on t.tripId = d.tripId where d.tripId = " .$tripId);
        $value = Current($creatorId);
        $creator = DB::select("select * from Users join Tourist on Users.username = Tourist.username join TouristTrip on Tourist.touristId = TouristTrip.touristId where TouristTrip.touristId = ".$value);
        
        //dd($tripCondition);
        return view('TouristTrip', ['creator' => $creator[0]], ['trip' => $tripData])->with('tripLocation',$tripLocation)->with('tripCondition',$tripCondition)->with('tripDetails',$tripDetails);
    }
    
    public function guideShowEditTrip($tripId){
        $tripData = DB::table('GuideTrip')->where(['tripId'=>$tripId])->first();
        $creatorId = DB::table('GuideTrip')->select('guideId')->where(['tripId'=>$tripId])->first();
        $value = Current($creatorId);
        $creator = DB::select("select * from Users join Guide on Users.username = Guide.username join GuideTrip on Guide.guideId = GuideTrip.guideId where GuideTrip.tripId = ".$tripId);
        $creatorId = DB::table('GuideTrip')->select('guideId')->where(['tripId'=>$tripId])->first();
        $guideId = $creatorId->guideId;
        $tripTransportation = DB::select("select t.tripTransportation from GuideTripTransportation t join GuideTrip g on g.tripId = t.tripId where t.tripId = " .$tripId);
        $tripCondition = DB::select("select c.tripCondition from GuideTripCondition c join GuideTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);
        $tripLocation = DB::select("select l.tripLocation from GuideTripLocation l join GuideTrip g on g.tripId = l.tripId where l.tripId = " .$tripId);
        $queryLocation = DB::select("select tripLocation from Location order by locationId");
        return view('GuideEditTrip', ['creator' => $creator[0]], ['trip' => $tripData],['creatorId' => $creatorId])->with('guideId',$guideId)->with('tripLocation',$tripLocation)->with('tripTransportation',$tripTransportation)->with('tripCondition',$tripCondition)->with('queryLocation',$queryLocation);
    }


    public function guideShowEditTripTime($tripId){
        $tripData = DB::table('GuideTrip')->where(['tripId'=>$tripId])->first();
        $tripDay = 1;
        $queryTime = DB::select("select tripTime, tripDescription from GuideTripDetails where tripId = ? and tripDay = ?",[$tripId,$tripDay]);
        $creatorId = DB::table('GuideTrip')->select('guideId')->where(['tripId'=>$tripId])->first();
        $guideId = $creatorId->guideId;
        return view('GuideEditTripTime', ['trip' => $tripData],['creatorId' => $creatorId])->with('tripDay',$tripDay)->with('queryTime',$queryTime)->with('guideId',$guideId);
    }

    public function touristShowEditTrip($tripId){
        $tripData = DB::table('TouristTrip')->where(['tripId'=>$tripId])->first();
        $creatorId = DB::table('TouristTrip')->select('touristId')->where(['tripId'=>$tripId])->first();
        $value = Current($creatorId);
        $creator = DB::select("select * from Users join Tourist on Users.username = Tourist.username join TouristTrip on Tourist.touristId = TouristTrip.touristId where TouristTrip.tripId = ".$tripId);
        $tripCondition = DB::select("select c.tripCondition from TouristTripCondition c join TouristTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);
        $touristId = $creatorId->touristId;
        $tripLocation = DB::select("select l.tripLocation from TouristTripLocation l join TouristTrip g on g.tripId = l.tripId where l.tripId = " .$tripId);
        $queryLocation = DB::select("select tripLocation from Location order by locationId");
        return view('TouristEditTrip', ['creator' => $creator[0]], ['trip' => $tripData],['creatorId' => $creatorId])->with('touristId',$touristId)->with('tripLocation',$tripLocation)->with('tripCondition',$tripCondition)->with('queryLocation',$queryLocation);
    }

    public function touristShowEditTripTime($tripId){
        $tripData = DB::table('TouristTrip')->where(['tripId'=>$tripId])->first();
        $tripDay = 1;
        $queryTime = DB::select("select tripTime, tripDescription from TouristTripDetails where tripId = ? and tripDay = ?",[$tripId,$tripDay]);
        $creatorId = DB::table('TouristTrip')->select('touristId')->where(['tripId'=>$tripId])->first();
        $touristId = $creatorId->touristId;
        
        return view('TouristEditTripTime', ['trip' => $tripData],['creatorId' => $creatorId])->with('tripDay',$tripDay)->with('queryTime',$queryTime)->with('touristId',$touristId);
    }

    public function gdeletetrip(Request $request){
        $tripId = $request->input('tripId');
        $queryOrder = DB::select("select distinct c.chatRoomId from TripOrder ord join ChatRoom c on ord.chatRoomId=c.chatRoomId where c.guideTripId=".$tripId);

        if(!empty($queryOrder)){
        $deleteTrip = DB::delete("delete from GuideTrip where tripId = ".$tripId);
        $deleteTripCondition = DB::delete("delete from GuideTripCondition where tripId = ".$tripId);
        $deleteTripDetails = DB::delete("delete from GuideTripDetails where tripId = ".$tripId);
        $deleteTripLocation = DB::delete("delete from GuideTripLocation where tripId = ".$tripId);
        $deleteTripTransportation = DB::delete("delete from GuideTripTransportation where tripId = ".$tripId);
        echo "<script>window.alert('Trip Deleted.')</script>";
        return redirect('/');
        }else{
            echo "<script>window.alert('Can't delete order opened trip.')</script>";
            return redirect('/');
        }
    }

    public function tdeletetrip(Request $request){
        $tripId = $request->input('tripId');
        $deleteTrip = DB::delete("delete from TouristTrip where tripId = ".$tripId);
        $deleteTripCondition = DB::delete("delete from TouristTripCondition where tripId = ".$tripId);
        $deleteTripLocation = DB::delete("delete from TouristTripLocation where tripId = ".$tripId);
        echo "<script>window.alert('Trip Deleted.')</script>";
        return redirect('/');
    }
}
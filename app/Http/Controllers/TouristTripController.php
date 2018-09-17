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
        return view('TouristCreateTripDetails',['tripId' => $tripId])->with('queryLocation',$queryLocation);;
    }

    public function TouristCreateTripDetails(Request $request){
        $tripId = $request->input('tripId');
        
        if(!empty($request->input('location'))){
            $queryLocation1 = DB::insert("insert into TouristTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location')]);
            if(!empty($request->input('location2'))){
                $queryLocation2 = DB::insert("insert into TouristTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location2')]);
                if(!empty($request->input('location3'))){
                    $queryLocation3 = DB::insert("insert into TouristTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location3')]);
                }
            }
        }

        if(isset($_POST['transportation'])){
            $transportation = $_POST['transportation'];
            foreach($transportation as $value){
                $queryTransportation = DB::insert("insert into TouristTripTransportation(tripId, tripTransportation) value(?,?)",[$tripId,$value]);
            }
        }

        if(isset($_POST['trip-conditions'])){
            $conditions = $_POST['trip-conditions'];
            foreach($conditions as $value){
                $queryTripConditions = DB::insert("insert into TouristTripCondition(tripId, tripCondition) value(?,?)",[$tripId,$value]);
            }
        }

        $tripDay = 1;
        return view('TouristCreateTripTime',['tripId' => $tripId],['tripDay' => $tripDay]);
    }

    public function GuideCreateTripTime(Request $request){
        $tripId = $request->input('tripId');
        $tripDay = $request->input('tripDay');
        if(!empty($request->input('time1'))){
            $queryTime1 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time1'),$request->input('desc1')]);
            if(!empty($request->input('time2'))){
                $queryTime2 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time2'),$request->input('desc2')]);
                if(!empty($request->input('time3'))){
                    $queryTime3 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time3'),$request->input('desc3')]);
                    if(!empty($request->input('time4'))){
                        $queryTime4 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time4'),$request->input('desc4')]);
                        if(!empty($request->input('time5'))){
                            $queryTime5 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time5'),$request->input('desc5')]);
                            if(!empty($request->input('time6'))){
                                $queryTime6 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time6'),$request->input('desc6')]);
                                if(!empty($request->input('time7'))){
                                    $queryTime7 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time7'),$request->input('desc7')]);
                                    if(!empty($request->input('time8'))){
                                        $queryTime8 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time8'),$request->input('desc8')]);
                                        if(!empty($request->input('time9'))){
                                            $queryTime9 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time9'),$request->input('desc9')]);
                                            if(!empty($request->input('time10'))){
                                                $queryTime10 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time10'),$request->input('desc10')]);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $tripDay++;
            switch($request->submit){
                case 'addDay':
                    return view('GuideCreateTripTime',['tripId' => $tripId],['tripDay' => $tripDay]);
                break;
                case 'submit':
                    $tripData = DB::table('GuideTrip')->where(['tripId'=>$tripId])->first();
                    $tripTransportation = DB::select("select t.tripTransportation from GuideTripTransportation t join GuideTrip g on g.tripId = t.tripId where t.tripId = " .$tripId);
            
                    $tripCondition = DB::select("select c.tripCondition from GuideTripCondition c join GuideTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);
            
                    $creatorId = DB::table('GuideTrip')->select('guideId')->where(['tripId'=>$tripId])->first();
                    $tripLocation = DB::select("select l.tripLocation from GuideTripLocation l join GuideTrip g on g.tripId = l.tripId where l.tripId = " .$tripId);
                    $tripCost = DB::table('GuideTrip')->select('tripCost')->where(['tripId'=>$tripId])->first();
                    $tripDetails = DB::select("select d.tripDay, d.tripTime, d.tripDescription from GuideTripDetails d join GuideTrip g on g.tripId = d.tripId where d.tripId = " .$tripId);
                    $value = Current($creatorId);
                    $creator = DB::select("select * from Users join Guide on Users.username = Guide.username join GuideTrip on Guide.guideId = GuideTrip.guideId where GuideTrip.tripId = ".$tripId);
                    return view('createtripcompleted', ['creator' => $creator[0]], ['trip' => $tripData], ['tripCost' => $tripCost])->with('tripLocation',$tripLocation)->with('tripTransportation',$tripTransportation)->with('tripCondition',$tripCondition)->with('tripDetails',$tripDetails);
                break;
            }
        }
    }
}
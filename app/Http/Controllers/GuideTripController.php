<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\GuideTrip;
use Illuminate\Support\Facades\Input;

class GuideTripController extends Controller
{
    public function guidecreatetrip(Request $request){
        $lastTripId = DB::select("select tripId from GuideTrip order by tripId desc limit 1");
        $tripIdObj = $lastTripId[0]->tripId;
        $tripId = $tripIdObj+1;

        $guideTripImage = $request->file('trippic');
        $input['filename'] = time().'.'.$guideTripImage->getClientOriginalExtension();
        $imagePath = public_path('/images/trippic');
        $guideTripImage->move($imagePath, $input['filename']);
        $guideTripPicName = $input['filename'];

        $queryGuideTrip = DB::insert("insert into GuideTrip(tripId,tripName,tripStart,tripEnd,tripPicture,tripTravellers,tripCost,guideId) values(?,?,?,?,?,?,?,?)",[$tripId,$request->input('tripname'),$request->input('startdate'),$request->input('enddate'),$guideTripPicName,$request->input('max-traveller'),$request->input('tripcost'),$request->input('guideid')]);
        return view('GuideCreateTripDetails',['tripId' => $tripId]);
    }

    public function GuideCreateTripDetails(Request $request){
        $tripId = $request->input('tripId');
        
        if(!empty($request->input('location'))){
            $queryLocation1 = DB::insert("insert into GuideTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location')]);
            if(!empty($request->input('location2'))){
                $queryLocation2 = DB::insert("insert into GuideTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location2')]);
                if(!empty($request->input('location3'))){
                    $queryLocation3 = DB::insert("insert into GuideTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location3')]);
                }
            }
        }

        if(isset($_POST['transportation'])){
            $transportation = $_POST['transportation'];
            foreach($transportation as $value){
                $queryTransportation = DB::insert("insert into GuideTripTransportation(tripId, tripTransportation) value(?,?)",[$tripId,$value]);
            }
        }

        if(isset($_POST['trip-conditions'])){
            $conditions = $_POST['trip-conditions'];
            foreach($conditions as $value){
                $queryTripConditions = DB::insert("insert into GuideTripCondition(tripId, tripCondition) value(?,?)",[$tripId,$value]);
            }
        }

        $tripDay = 1;
        return view('GuideCreateTripTime',['tripId' => $tripId],['tripDay' => $tripDay]);
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
                    return view('createtripcompleted');
                break;
            }
        }
    }
}

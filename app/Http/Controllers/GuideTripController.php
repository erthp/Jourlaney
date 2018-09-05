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

        $tripName = $request->input('tripname');
        $maxTraveller = $request->input('max-traveller');
        $tripCost = $request->input('tripcost');
        $queryGuideTrip = DB::insert("insert into GuideTrip(tripId,tripName,tripStart,tripEnd,tripPicture,tripTravellers,tripCost,guideId) values(?,?,?,?,?,?,?,?)",[$tripId,$tripName,$request->input('startdate'),$request->input('enddate'),$guideTripPicName,$maxTraveller,$tripCost,$request->input('guideid')]);
        $queryLocation = DB::select("select tripLocation from Location order by locationId");
        return view('GuideCreateTripDetails',['tripId' => $tripId])->with('queryLocation',$queryLocation);
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

    public function guideedittrip(Request $request){
        $tripId = $request->input('tripId');;

        if($request->hasFile('trippic')){
            $guideTripImage = $request->file('trippic');
            $input['filename'] = time().'.'.$guideTripImage->getClientOriginalExtension();
            $imagePath = public_path('/images/trippic');
            $guideTripImage->move($imagePath, $input['filename']);
            $guideTripPicName = $input['filename'];
        }else{
            $queryGuideTripPicName = DB::select("select tripPicture from GuideTrip where tripId =".$tripId);
            $guideTripPicName = $queryGuideTripPicName[0]->tripPicture;
        }

        $tripCondition = array('','','','','');
        $tripName = $request->input('tripname');
        $maxTraveller = $request->input('max-traveller');
        $tripCost = $request->input('tripcost');
        $tripTransportation = DB::select("select t.tripTransportation from GuideTripTransportation t join GuideTrip g on g.tripId = t.tripId where t.tripId = " .$tripId);
        $tripCondition = DB::select("select c.tripCondition from GuideTripCondition c join GuideTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);
        $creatorId = DB::table('GuideTrip')->select('guideId')->where(['tripId'=>$tripId])->first();
        $tripLocation = DB::select("select l.tripLocation from GuideTripLocation l join GuideTrip g on g.tripId = l.tripId where l.tripId = " .$tripId);
        $queryLocation = DB::select("select tripLocation from Location order by locationId");
        $queryGuideTrip = DB::update("update GuideTrip set tripName = ?, tripStart = ?, tripEnd = ?, tripPicture = ?, tripTravellers = ?, tripCost = ? where tripId = ?",[$tripName,$request->input('startdate'),$request->input('enddate'),$guideTripPicName,$maxTraveller,$tripCost,$tripId]);
        return view('GuideEditTripDetails',['tripId' => $tripId])->with('tripLocation',$tripLocation)->with('tripTransportation',$tripTransportation)->with('tripCondition',$tripCondition)->with('queryLocation',$queryLocation);
    }

    public function GuideEditTripDetails(Request $request){
        $tripId = $request->input('tripId');
        
        if(!empty($request->input('location'))){
            $queryLocation1 = DB::insert("update GuideTripLocation set tripId = ?, tripLocation = ?",[$tripId,$request->input('location')]);
            if(!empty($request->input('location2'))){
                $queryLocation2 = DB::insert("update GuideTripLocation set tripId = ?, tripLocation = ?",[$tripId,$request->input('location2')]);
                if(!empty($request->input('location3'))){
                    $queryLocation3 = DB::insert("update GuideTripLocation set tripId = ?, tripLocation = ?",[$tripId,$request->input('location3')]);
                }
            }
        }

        if(isset($_POST['transportation'])){
            $transportation = $_POST['transportation'];
            foreach($transportation as $value){
                $queryTransportation = DB::insert("update GuideTripTransportation set tripId = ?, tripTransportation = ?",[$tripId,$value]);
            }
        }

        if(isset($_POST['trip-conditions'])){
            $conditions = $_POST['trip-conditions'];
            foreach($conditions as $value){
                $queryTripConditions = DB::insert("update GuideTripCondition set tripId = ?, tripCondition = ?",[$tripId,$value]);
            }
        }

        $tripDay = 1;
        $queryTime = DB::select("select tripTime, tripDescription from GuideTripDetails where tripId = ?, tripDay = ?",[$tripId,$tripDay]);
        return view('GuideEditTripTime',['tripId' => $tripId],['tripDay' => $tripDay]);
    }

    public function GuideEditTripTime(Request $request){
        $tripId = $request->input('tripId');
        $tripDay = $request->input('tripDay');
        if(!empty($request->input('time1'))){
            $queryTime1 = DB::insert("update GuideTripDetails set tripId = ?, tripDay = ?, tripTime = ?, tripDescription = ?",[$tripId,$tripDay,$request->input('time1'),$request->input('desc1')]);
            if(!empty($request->input('time2'))){
                $queryTime2 = DB::insert("update GuideTripDetails set tripId = ?, tripDay = ?, tripTime = ?, tripDescription = ?",[$tripId,$tripDay,$request->input('time2'),$request->input('desc2')]);
                if(!empty($request->input('time3'))){
                    $queryTime3 = DB::insert("update GuideTripDetails set tripId = ?, tripDay = ?, tripTime = ?, tripDescription = ?",[$tripId,$tripDay,$request->input('time3'),$request->input('desc3')]);
                    if(!empty($request->input('time4'))){
                        $queryTime4 = DB::insert("update GuideTripDetails set tripId = ?, tripDay = ?, tripTime = ?, tripDescription = ?",[$tripId,$tripDay,$request->input('time4'),$request->input('desc4')]);
                        if(!empty($request->input('time5'))){
                            $queryTime5 = DB::insert("update GuideTripDetails set tripId = ?, tripDay = ?, tripTime = ?, tripDescription = ?",[$tripId,$tripDay,$request->input('time5'),$request->input('desc5')]);
                            if(!empty($request->input('time6'))){
                                $queryTime6 = DB::insert("update GuideTripDetails set tripId = ?, tripDay = ?, tripTime = ?, tripDescription = ?",[$tripId,$tripDay,$request->input('time6'),$request->input('desc6')]);
                                if(!empty($request->input('time7'))){
                                    $queryTime7 = DB::insert("update GuideTripDetails set tripId = ?, tripDay = ?, tripTime = ?, tripDescription = ?",[$tripId,$tripDay,$request->input('time7'),$request->input('desc7')]);
                                    if(!empty($request->input('time8'))){
                                        $queryTime8 = DB::insert("update GuideTripDetails set tripId = ?, tripDay = ?, tripTime = ?, tripDescription = ?",[$tripId,$tripDay,$request->input('time8'),$request->input('desc8')]);
                                        if(!empty($request->input('time9'))){
                                            $queryTime9 = DB::insert("update GuideTripDetails set tripId = ?, tripDay = ?, tripTime = ?, tripDescription = ?",[$tripId,$tripDay,$request->input('time9'),$request->input('desc9')]);
                                            if(!empty($request->input('time10'))){
                                                $queryTime10 = DB::insert("update GuideTripDetails set tripId = ?, tripDay = ?, tripTime = ?, tripDescription = ?",[$tripId,$tripDay,$request->input('time10'),$request->input('desc10')]);
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
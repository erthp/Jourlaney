<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\GuideTrip;

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

        $queryGuideTrip = DB::insert("insert into GuideTrip(tripId,tripName,tripStart,tripEnd,tripPicture,tripTravellers,guideId) values(?,?,?,?,?,?,?)",[$tripId,$request->input('tripname'),$request->input('startdate'),$request->input('enddate'),$guideTripPicName,$request->input('max-traveller'),$request->input('guideid')]);
        
        if(!empty($request->input('location'))){
            $queryLocation1 = DB::insert("insert into GuideTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location')]);
            if(!empty($request->input('location2'))){
                $queryLocation2 = DB::insert("insert into GuideTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location2')]);
                if(!empty($request->input('location3'))){
                    $queryLocation3 = DB::insert("insert into GuideTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location3')]);
                }
            }
        }
        
        if(!empty($request->input('transportation'))){ // ถ้าไม่ได้ให้เปลี่ยนเป็น $request ...
            foreach((array)$_POST['transportation'] as $value){
                $queryTransportation = DB::insert("insert into GuideTripTransportation(tripId, tripTransportation) value(?,?)",[$tripId,$value]);
            }
        }

        if(isset($_POST['trip-conditions'])){
            foreach((array)$_POST['trip-conditions'] as $value){
                $queryTripConditions = DB::insert("insert into GuideTripCondition(tripId, tripCondition) value(?,?)",[$tripId,$value]);
            }
        }
        
        return view('createtripcompleted');
    }
}

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
        $queryLocation = DB::select("select tripLocation from Location order by locationId");
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

        if(isset($_POST['trip-conditions'])){
            $conditions = $_POST['trip-conditions'];
            foreach($conditions as $value){
                $queryTripConditions = DB::insert("insert into TouristTripCondition(tripId, tripCondition) value(?,?)",[$tripId,$value]);
            }
        }

        $tripDay = 1;
        return view('TouristCreateTripTime',['tripId' => $tripId],['tripDay' => $tripDay]);
    }

    public function TouristCreateTripTime(Request $request){
        $tripId = $request->input('tripId');
        $tripDay = $request->input('tripDay');
        if(!empty($request->input('time1'))){
            $queryTime1 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time1'),$request->input('desc1')]);
        }if(!empty($request->input('time2'))){
            $queryTime2 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time2'),$request->input('desc2')]);
        }if(!empty($request->input('time3'))){
            $queryTime3 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time3'),$request->input('desc3')]);
        }if(!empty($request->input('time4'))){
            $queryTime4 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time4'),$request->input('desc4')]);
        }if(!empty($request->input('time5'))){
            $queryTime5 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time5'),$request->input('desc5')]);
        }if(!empty($request->input('time6'))){
            $queryTime6 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time6'),$request->input('desc6')]);
        }if(!empty($request->input('time7'))){
            $queryTime7 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time7'),$request->input('desc7')]);
        }if(!empty($request->input('time8'))){
            $queryTime8 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time8'),$request->input('desc8')]);
        }if(!empty($request->input('time9'))){
            $queryTime9 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time9'),$request->input('desc9')]);
        }if(!empty($request->input('time10'))){
            $queryTime10 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time10'),$request->input('desc10')]);
        }if(!empty($request->input('time11'))){
            $queryTime10 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time11'),$request->input('desc11')]);
        }if(!empty($request->input('time12'))){
            $queryTime10 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time12'),$request->input('desc12')]);
        }if(!empty($request->input('time13'))){
            $queryTime10 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time13'),$request->input('desc13')]);
        }if(!empty($request->input('time14'))){
            $queryTime10 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time14'),$request->input('desc14')]);
        }if(!empty($request->input('time15'))){
            $queryTime10 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time15'),$request->input('desc15')]);
        }
            $tripDay++;
            switch($request->submit){
                case 'addDay':
                    return view('TouristCreateTripTime',['tripId' => $tripId],['tripDay' => $tripDay]);
                break;
                case 'submit':
                    $tripData = DB::table('TouristTrip')->where(['tripId'=>$tripId])->first();
                    
                    $tripCondition = DB::select("select c.tripCondition from TouristTripCondition c join TouristTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);
            
                    $creatorId = DB::table('TouristTrip')->select('touristId')->where(['tripId'=>$tripId])->first();
                    $tripLocation = DB::select("select l.tripLocation from TouristTripLocation l join TouristTrip g on g.tripId = l.tripId where l.tripId = " .$tripId);
                    $tripDetails = DB::select("select d.tripDay, d.tripTime, d.tripDescription from TouristTripDetails d join TouristTrip g on g.tripId = d.tripId where d.tripId = " .$tripId);
                    $value = Current($creatorId);
                    $creator = DB::select("select * from Users join Tourist on Users.username = Tourist.username join TouristTrip on Tourist.touristId = TouristTrip.TouristId where TouristTrip.tripId = ".$tripId);
                    return view('createtripcompleted', ['creator' => $creator[0]], ['trip' => $tripData])->with('tripLocation',$tripLocation)->with('tripCondition',$tripCondition)->with('tripDetails',$tripDetails);
                break;
            }
        }
        public function touristedittrip(Request $request){
            $tripId = $request->input('tripId');;
    
            if($request->hasFile('trippic')){
                $touristTripImage = $request->file('trippic');
                $input['filename'] = time().'.'.$touristTripImage->getClientOriginalExtension();
                $imagePath = public_path('/images/trippic');
                $touristTripImage->move($imagePath, $input['filename']);
                $touristTripPicName = $input['filename'];
            }else{
                $queryTouristTripPicName = DB::select("select tripPicture from TouristTrip where tripId =".$tripId);
                $touristTripPicName = $queryTouristTripPicName[0]->tripPicture;
            }
    
            $tripCondition = array('','','','','');
            $tripName = $request->input('tripname');
            $tripCondition = DB::select("select c.tripCondition from TouristTripCondition c join TouristTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);
            $creatorId = DB::table('TouristTrip')->select('touristId')->where(['tripId'=>$tripId])->first();
            $tripLocation = DB::select("select l.tripLocation from TouristTripLocation l join TouristTrip g on g.tripId = l.tripId where l.tripId = " .$tripId);
            $queryLocation = DB::select("select tripLocation from Location order by locationId");
            $queryTouristTrip = DB::update("update TouristTrip set tripName = ?, tripStart = ?, tripEnd = ?, tripPicture = ? where tripId = ?",[$tripName,$request->input('startdate'),$request->input('enddate'),$touristTripPicName,$tripId]);
            return view('TouristEditTripDetails',['tripId' => $tripId],['creatorId' => $creatorId])->with('tripLocation',$tripLocation)->with('tripCondition',$tripCondition)->with('queryLocation',$queryLocation);
        }
    
        public function TouristEditTripDetails(Request $request){
            $tripId = $request->input('tripId');
            
            if(!empty($request->input('location'))){
                $rmlocation = DB::delete("delete from TouristTripLocation where tripId = ?",[$tripId]);
                $queryLocation1 = DB::insert("insert into TouristTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location')]);
                if(!empty($request->input('location2'))){
                    $queryLocation2 = DB::insert("insert into TouristTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location2')]);
                    if(!empty($request->input('location3'))){
                        $queryLocation3 = DB::insert("insert into TouristTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location3')]);
                    }
                }
            }

            $rmCondition = DB::delete("delete from TouristTripCondition where tripId = ?",[$tripId]);
            if(isset($_POST['trip-conditions'])){
            $conditions = $_POST['trip-conditions'];
            foreach($conditions as $value){
                $queryTripConditions = DB::insert("insert into TouristTripCondition(tripId, tripCondition) value(?,?)",[$tripId,$value]);
            }
        }
            
            $tripDay = 1;
            $queryTime = DB::select("select tripTime, tripDescription from TouristTripDetails where tripId = ? and tripDay = ?",[$tripId,$tripDay]);
            $creatorId = DB::table('TouristTrip')->select('touristId')->where(['tripId'=>$tripId])->first();
            return view('TouristEditTripTime',['tripId' => $tripId],['tripDay' => $tripDay],['creatorId' => $creatorId])->with('queryTime',$queryTime);
        }
    
        public function TouristEditTripTime(Request $request){
            $tripId = $request->input('tripId');
            $tripDay = $request->input('tripDay');
    
            if(!empty($request->input('time1'))){
                $rm = DB::delete("delete from TouristTripDetails where tripId = ".$tripId." and tripDay = ".$tripDay);
                $queryTime1 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time1'),$request->input('desc1')]);
                if(!empty($request->input('time2'))){
                    $queryTime2 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time2'),$request->input('desc2')]);
                }if(!empty($request->input('time3'))){
                    $queryTime3 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time3'),$request->input('desc3')]);
                }if(!empty($request->input('time4'))){
                    $queryTime4 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time4'),$request->input('desc4')]);
                }if(!empty($request->input('time5'))){
                    $queryTime5 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time5'),$request->input('desc5')]);
                }if(!empty($request->input('time6'))){
                    $queryTime6 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time6'),$request->input('desc6')]);
                }if(!empty($request->input('time7'))){
                    $queryTime7 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time7'),$request->input('desc7')]);
                }if(!empty($request->input('time8'))){
                    $queryTime8 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time8'),$request->input('desc8')]);
                }if(!empty($request->input('time9'))){
                    $queryTime9 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time9'),$request->input('desc9')]);
                }if(!empty($request->input('time10'))){
                    $queryTime10 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time10'),$request->input('desc10')]);
                }if(!empty($request->input('time11'))){
                    $queryTime10 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time11'),$request->input('desc11')]);
                }if(!empty($request->input('time12'))){
                    $queryTime10 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time12'),$request->input('desc12')]);
                }if(!empty($request->input('time13'))){
                    $queryTime10 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time13'),$request->input('desc13')]);
                }if(!empty($request->input('time14'))){
                    $queryTime10 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time14'),$request->input('desc14')]);
                }if(!empty($request->input('time15'))){
                    $queryTime10 = DB::insert("insert into TouristTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time15'),$request->input('desc15')]);
                }
                
                $tripDay++;
                $queryTime = DB::select("select tripTime, tripDescription from TouristTripDetails where tripId = ? and tripDay = ?",[$tripId,$tripDay]);
                switch($request->submit){
                    case 'addDay':
                        if(!empty($queryTime))
                            return view('TouristEditTripTime',['tripId' => $tripId],['tripDay' => $tripDay])->with('queryTime',$queryTime);
                        else
                        return view('TouristCreateTripTime',['tripId' => $tripId],['tripDay' => $tripDay])->with('queryTime',$queryTime);
                    break;
                    case 'submit':
                    $tripData = DB::table('TouristTrip')->where(['tripId'=>$tripId])->first();
                        
                    $tripCondition = DB::select("select c.tripCondition from TouristTripCondition c join TouristTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);
                    
                    $creatorId = DB::table('TouristTrip')->select('touristId')->where(['tripId'=>$tripId])->first();
                    $tripLocation = DB::select("select l.tripLocation from TouristTripLocation l join TouristTrip g on g.tripId = l.tripId where l.tripId = " .$tripId);
                    $tripDetails = DB::select("select d.tripDay, d.tripTime, d.tripDescription from TouristTripDetails d join TouristTrip g on g.tripId = d.tripId where d.tripId = " .$tripId);
                    $value = Current($creatorId);
                    $creator = DB::select("select * from Users join Tourist on Users.username = Tourist.username join TouristTrip on Tourist.touristId = TouristTrip.touristId where TouristTrip.tripId = ".$tripId);
                    return view('createtripcompleted', ['creator' => $creator[0]], ['trip' => $tripData])->with('tripLocation',$tripLocation)->with('tripCondition',$tripCondition)->with('tripDetails',$tripDetails)->with('tripTransportation',$tripTransportation);
                    break;
                }
            }
        }
    
}
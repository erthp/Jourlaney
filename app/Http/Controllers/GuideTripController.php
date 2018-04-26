<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\GuideTrip;

class GuideTripController extends Controller
{
    public function gcreatetrip(Request $request){
        $queryGuideTrip = DB::insert("insert into GuideTrip(tripName,tripLocation,tripDetails,tripStart,tripEnd,tripTransportation,tripTravellers,tripCondition) values(?,?,?,?,?,?,?,?)",[$request->input('tripname'),$request->input('location'),$request->input('details'),$request->input('startdate'),$request->input('enddate'),$request->input('transportation'),$request->input('max-traveller'),$request->input('trip-conditions')]);
        return view('createtripcompleted');
    }
}

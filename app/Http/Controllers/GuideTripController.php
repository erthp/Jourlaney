<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\GuideTrip;

class GuideTripController extends Controller
{
    public function guidetrip(Request $request){
        $queryGuideTrip = DB::insert("insert into GuideTrip(tripId,tripName,tripLocation,tripDetails,guideId) values(?,?,?,?,?)",[$request->input('tripname'),$request->input('location'),$request->input('date'),$request->input('file_source'),$request->input('transportation'),$request->input('max-traveller'),$request->input('language'),$request->input('trip-conditions'),$request->input('trip-details')]);
        echo "Create Trip Complete";
    }
}

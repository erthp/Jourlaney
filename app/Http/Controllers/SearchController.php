<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Trip;
use DB;

class SearchController extends Controller
{
    public function getdata(){
        $input = Input::get('search');
        $trip = DB::select('select t.tripId, t.tripName, t.tripLocation, t.guideId, u.userFirstName, t.tripStart, t.tripEnd from GuideTrip t join Guide g on t.GuideId=g.GuideId join Users u on g.username=u.username where t.tripName like ?',array('%'. $input .'%'));
        dd($trip);
        //return view('search', ['trip' => $trip]);
    }
}

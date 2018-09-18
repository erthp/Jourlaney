<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Trip;
use DB;

class SearchController extends Controller
{
    public function getdata(Request $request){
        $name = Input::get('name');
        $startdate = Input::get('startdate');
        $enddate = Input::get('enddate');
        $trip = DB::select("select * from GuideTrip t join Guide g on t.GuideId=g.GuideId join Users u on g.username=u.username where (t.tripStart between '".$startdate."' and '".$enddate."') or (t.tripEnd between '".$startdate."' and '".$enddate."') or (t.tripStart <= '".$startdate."' and t.tripEnd >= '".$enddate."') and t.tripName like "."'%".$name."%'");
        return view('search', ['trip' => $trip]);
    }
}

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
        $showGuideTrip = Input::get('guide');
        $showTouristTrip = Input::get('tourist');

        if($showGuideTrip == "on"){
            if(empty($name)){
                $trip = DB::select("select * from GuideTrip t join Guide g on t.guideId=g.guideId join Users u on g.username=u.username where (t.tripStart between '".$startdate."' and '".$enddate."') or (t.tripEnd between '".$startdate."' and '".$enddate."') or (t.tripStart <= '".$startdate."' and t.tripEnd >= '".$enddate."')");
            }elseif(empty($startdate) && empty($enddate)){
                $trip = DB::select("select * from GuideTrip t join Guide g on t.guideId=g.guideId join Users u on g.username=u.username where t.tripName like '%$name%'");
            }else{
                $trip = DB::select("select * from GuideTrip t join Guide g on t.guideId=g.guideId join Users u on g.username=u.username where ((t.tripStart between '".$startdate."' and '".$enddate."') or (t.tripEnd between '".$startdate."' and '".$enddate."') or (t.tripStart <= '".$startdate."' and t.tripEnd >= '".$enddate."')) and (t.tripName like '%$name%')");
            }
        }elseif($showTouristTrip == "on"){
            if(empty($name)){
                $trip = DB::select("select * from TouristTrip t join Tourist tr on t.touristId=tr.touristId join Users u on tr.username=u.username where (t.tripStart between '".$startdate."' and '".$enddate."') or (t.tripEnd between '".$startdate."' and '".$enddate."') or (t.tripStart <= '".$startdate."' and t.tripEnd >= '".$enddate."')");
            }elseif(empty($startdate) && empty($enddate)){
                $trip = DB::select("select * from TouristTrip t join Tourist tr on t.touristId=tr.touristId join Users u on tr.username=u.username where t.tripName like '%$name%'");
            }else{
                $trip = DB::select("select * from TouristTrip t join Tourist tr on t.touristId=tr.touristId join Users u on tr.username=u.username where ((t.tripStart between '".$startdate."' and '".$enddate."') or (t.tripEnd between '".$startdate."' and '".$enddate."') or (t.tripStart <= '".$startdate."' and t.tripEnd >= '".$enddate."')) and (t.tripName like '%$name%')");
            }
        }elseif($showGuideTrip == "on" && $showTouristTrip == "on"){
            if(empty($name)){
                $trip = DB::select("select * from GuideTrip t join Guide g on t.guideId=g.guideId join Users u on g.username=u.username where (t.tripStart between '".$startdate."' and '".$enddate."') or (t.tripEnd between '".$startdate."' and '".$enddate."') or (t.tripStart <= '".$startdate."' and t.tripEnd >= '".$enddate."') union select * from TouristTrip t join Tourist tr on t.touristId=tr.touristId join Users u on tr.username=u.username where (t.tripStart between '".$startdate."' and '".$enddate."') or (t.tripEnd between '".$startdate."' and '".$enddate."') or (t.tripStart <= '".$startdate."' and t.tripEnd >= '".$enddate."')");
            }elseif(empty($startdate) && empty($enddate)){
                $trip = DB::select("(select * from GuideTrip t join Guide g on t.guideId=g.guideId join Users u on g.username=u.username where t.tripName like '%$name%') union (select * from TouristTrip t join Tourist tr on t.touristId=tr.touristId join Users u on tr.username=u.username where t.tripName like '%$name%')");
            }else{
                $trip = DB::select("(select * from GuideTrip t join Guide g on t.guideId=g.guideId join Users u on g.username=u.username where ((t.tripStart between '".$startdate."' and '".$enddate."') or (t.tripEnd between '".$startdate."' and '".$enddate."') or (t.tripStart <= '".$startdate."' and t.tripEnd >= '".$enddate."')) and (t.tripName like '%$name%')) union (select * from TouristTrip t join Tourist tr on t.touristId=tr.touristId join Users u on tr.username=u.username where ((t.tripStart between '".$startdate."' and '".$enddate."') or (t.tripEnd between '".$startdate."' and '".$enddate."') or (t.tripStart <= '".$startdate."' and t.tripEnd >= '".$enddate."')) and (t.tripName like '%$name%'))");
            }
        }else{
            if(empty($name)){
            $trip = DB::select("select * from GuideTrip t join Guide g on t.guideId=g.guideId join Users u on g.username=u.username where (t.tripStart between '".$startdate."' and '".$enddate."') or (t.tripEnd between '".$startdate."' and '".$enddate."') or (t.tripStart <= '".$startdate."' and t.tripEnd >= '".$enddate."')");
        }elseif(empty($startdate) && empty($enddate)){
            $trip = DB::select("select * from GuideTrip t join Guide g on t.guideId=g.guideId join Users u on g.username=u.username where t.tripName like '%$name%'");
        }else{
            $trip = DB::select("select * from GuideTrip t join Guide g on t.guideId=g.guideId join Users u on g.username=u.username where ((t.tripStart between '".$startdate."' and '".$enddate."') or (t.tripEnd between '".$startdate."' and '".$enddate."') or (t.tripStart <= '".$startdate."' and t.tripEnd >= '".$enddate."')) and (t.tripName like '%$name%')");
        }
    }
        return view('search', ['trip' => $trip])->with('name',$name)->with('startdate',$startdate)->with('enddate',$enddate);
    }
}

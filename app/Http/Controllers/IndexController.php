<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class IndexController extends Controller
{
    public function getdata(){
        $today = Carbon::today('Asia/Bangkok')->isoFormat('YYYY-MM-DD');
        $next1 = Carbon::today('Asia/Bangkok')->add('1 days')->isoFormat('YYYY-MM-DD');
        $next2 = Carbon::today('Asia/Bangkok')->add('2 days')->isoFormat('YYYY-MM-DD');
        $next3 = Carbon::today('Asia/Bangkok')->add('3 days')->isoFormat('YYYY-MM-DD');
        $next4 = Carbon::today('Asia/Bangkok')->add('4 days')->isoFormat('YYYY-MM-DD');
        $next5 = Carbon::today('Asia/Bangkok')->add('5 days')->isoFormat('YYYY-MM-DD');
        $next6 = Carbon::today('Asia/Bangkok')->add('6 days')->isoFormat('YYYY-MM-DD');
        $next7 = Carbon::today('Asia/Bangkok')->add('7 days')->isoFormat('YYYY-MM-DD');
        $next8 = Carbon::today('Asia/Bangkok')->add('8 days')->isoFormat('YYYY-MM-DD');
        $next9 = Carbon::today('Asia/Bangkok')->add('9 days')->isoFormat('YYYY-MM-DD');
        $next10 = Carbon::today('Asia/Bangkok')->add('10 days')->isoFormat('YYYY-MM-DD');
        $next11 = Carbon::today('Asia/Bangkok')->add('11 days')->isoFormat('YYYY-MM-DD');
        $next12 = Carbon::today('Asia/Bangkok')->add('12 days')->isoFormat('YYYY-MM-DD');
        
        $queryGuideTrips = DB::select("select * from GuideTrip t join Guide g on t.guideId=g.guideId join Users u on g.username = u.username where t.tripStart = '".$today."' or t.tripStart = '".$next1."' or t.tripStart = '".$next2."' or t.tripStart = '".$next3."' or t.tripStart = '".$next4."' or t.tripStart = '".$next5."' or t.tripStart = '".$next6."'");
        shuffle($queryGuideTrips);

        $queryUpcomingGuideTrips = DB::select("select * from GuideTrip t join Guide g on t.guideId=g.guideId join Users u on g.username = u.username where t.tripStart = '".$next7."' or t.tripStart = '".$next8."' or t.tripStart = '".$next9."' or t.tripStart = '".$next10."' or t.tripStart = '".$next11."' or t.tripStart = '".$next11."' or t.tripStart = '".$next12."'");
        shuffle($queryGuideTrips);

        $queryTouristTrips = DB::select("select * from TouristTrip tt join Tourist t on tt.touristId=t.touristId join Users u on t.username = u.username where tt.tripStart = '".$today."' or tt.tripStart = '".$next1."' or tt.tripStart = '".$next2."' or tt.tripStart = '".$next3."' or tt.tripStart = '".$next4."' or tt.tripStart = '".$next5."' or tt.tripStart = '".$next6."'");
        shuffle($queryTouristTrips);

        return view('index')->with('guideTrips',$queryGuideTrips)->with('upcomingGuideTrips',$queryUpcomingGuideTrips)->with('touristTrips',$queryTouristTrips)->with('today',$today)->with('next6',$next6)->with('next7',$next7)->with('next12',$next12);
    }

    public function getdataTH(){
        $today = Carbon::today('Asia/Bangkok')->isoFormat('YYYY-MM-DD');
        $next1 = Carbon::today('Asia/Bangkok')->add('1 days')->isoFormat('YYYY-MM-DD');
        $next2 = Carbon::today('Asia/Bangkok')->add('2 days')->isoFormat('YYYY-MM-DD');
        $next3 = Carbon::today('Asia/Bangkok')->add('3 days')->isoFormat('YYYY-MM-DD');
        $next4 = Carbon::today('Asia/Bangkok')->add('4 days')->isoFormat('YYYY-MM-DD');
        $next5 = Carbon::today('Asia/Bangkok')->add('5 days')->isoFormat('YYYY-MM-DD');
        $next6 = Carbon::today('Asia/Bangkok')->add('6 days')->isoFormat('YYYY-MM-DD');
        $next7 = Carbon::today('Asia/Bangkok')->add('7 days')->isoFormat('YYYY-MM-DD');
        $next8 = Carbon::today('Asia/Bangkok')->add('8 days')->isoFormat('YYYY-MM-DD');
        $next9 = Carbon::today('Asia/Bangkok')->add('9 days')->isoFormat('YYYY-MM-DD');
        $next10 = Carbon::today('Asia/Bangkok')->add('10 days')->isoFormat('YYYY-MM-DD');
        $next11 = Carbon::today('Asia/Bangkok')->add('11 days')->isoFormat('YYYY-MM-DD');
        $next12 = Carbon::today('Asia/Bangkok')->add('12 days')->isoFormat('YYYY-MM-DD');
        
        $queryGuideTrips = DB::select("select * from GuideTrip t join Guide g on t.guideId=g.guideId join Users u on g.username = u.username where t.tripStart = '".$today."' or t.tripStart = '".$next1."' or t.tripStart = '".$next2."' or t.tripStart = '".$next3."' or t.tripStart = '".$next4."' or t.tripStart = '".$next5."' or t.tripStart = '".$next6."'");
        shuffle($queryGuideTrips);

        $queryUpcomingGuideTrips = DB::select("select * from GuideTrip t join Guide g on t.guideId=g.guideId join Users u on g.username = u.username where t.tripStart = '".$next7."' or t.tripStart = '".$next8."' or t.tripStart = '".$next9."' or t.tripStart = '".$next10."' or t.tripStart = '".$next11."' or t.tripStart = '".$next11."' or t.tripStart = '".$next12."'");
        shuffle($queryGuideTrips);

        $queryTouristTrips = DB::select("select * from TouristTrip tt join Tourist t on tt.touristId=t.touristId join Users u on t.username = u.username where tt.tripStart = '".$today."' or tt.tripStart = '".$next1."' or tt.tripStart = '".$next2."' or tt.tripStart = '".$next3."' or tt.tripStart = '".$next4."' or tt.tripStart = '".$next5."' or tt.tripStart = '".$next6."'");
        shuffle($queryTouristTrips);

        return view('th/index')->with('guideTrips',$queryGuideTrips)->with('upcomingGuideTrips',$queryUpcomingGuideTrips)->with('touristTrips',$queryTouristTrips)->with('today',$today)->with('next6',$next6)->with('next7',$next7)->with('next12',$next12);
    }
}

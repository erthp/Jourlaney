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
        
        $queryGuideTrips = DB::select("select * from GuideTrip t join Guide g on t.guideId=g.guideId join Users u on g.username = u.username where t.tripStart = '".$today."' or t.tripStart = '".$next1."' or t.tripStart = '".$next2."' or t.tripStart = '".$next3."' or t.tripStart = '".$next4."' or t.tripStart = '".$next5."' or t.tripStart = '".$next6."'");
        return view('index')->with('guideTrip',$queryGuideTrips);
    }
}

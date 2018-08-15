<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ProfileController extends Controller
{
    public function showProfile($username){
        $check = DB::table('Users')->where(['username'=>$username])->first();
        $checkGuide = DB::table('Guide')->where(['username'=>$username])->first();
        $checkTourist = DB::table('Tourist')->where(['username'=>$username])->first();

        if(!empty($checkGuide)){
            $profileGuideLocation = DB::table('Guide')->select('guideLocation')->where(['username'=>$username])->get();
            Session::put('profileGuideLocation', $profileGuideLocation[0]->guideLocation);
            $profileGuideRating = DB::table('Guide')->select('guideRating')->where(['username'=>$username])->get();
            Session::put('profileGuideRating', $profileGuideRating[0]->guideRating);
            $trip = DB::select('select * from GuideTrip join Guide on GuideTrip.guideId=Guide.guideId where Guide.username="'.$username.'"');
        }
        if(!empty($checkTourist)){
            $profileTouristRating = DB::table('Tourist')->select('touristRating')->where(['username'=>$username])->get();
            $trip = DB::select('select * from TouristTrip join Tourist on TouristTrip.touristId=Tourist.touristId where Tourist.username="'.$username.'"');
        }

        if($check){
            $userProfileImage = DB::table('Users')->select('userProfileImage')->where(['username'=>$username])->get();
            return view('Profile', ['trip' => $trip])->withUser($check,$checkGuide,$checkTourist);
        }
    }
}

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
        $touristRating = 0.00;
        $guideRating = 0.00;
        $guideLocation = "";

        if(!empty($checkGuide)){
            $profileGuideLocation = DB::table('Guide')->select('guideLocation')->where(['username'=>$username])->get();
            $guideLocation = $profileGuideLocation[0]->guideLocation;
            $profileGuideRating = DB::table('Guide')->select('guideRating')->where(['username'=>$username])->get();
            $guideRating = number_format($profileGuideRating[0]->guideRating,2);
            $trip = DB::select('select * from GuideTrip join Guide on GuideTrip.guideId=Guide.guideId where Guide.username="'.$username.'"');
        }
        if(!empty($checkTourist)){
            $profileTouristRating = DB::table('Tourist')->select('touristRating')->where(['username'=>$username])->get();
            $touristRating = $profileTouristRating[0]->touristRating;
            $trip = DB::select('select * from TouristTrip join Tourist on TouristTrip.touristId=Tourist.touristId where Tourist.username="'.$username.'"');
        }

        if($check){
            $userProfileImage = DB::table('Users')->select('userProfileImage')->where(['username'=>$username])->get();
            return view('Profile', ['trip' => $trip])->withUser($check,$checkGuide,$checkTourist)->with('guide',$checkGuide)->with('tourist',$checkTourist)->with('guideLocation',$guideLocation)->with('guideRating',$guideRating)->with('touristRating',$touristRating);
        }
    }

    public function ShowProfileFreeDay($username){
        $user = DB::table('Users')->where(['username'=>$username])->first();
        $queryGuideId = DB::select("select guideId from Guide where username='".$username."'");
        $guideId = $queryGuideId[0]->guideId;
        $freeDay = DB::select("select freeday from GuideFreeDay where status='Free' and guideId='".$guideId."'");
        $check = DB::table('Users')->where(['username'=>$username])->first();
        $checkGuide = DB::table('Guide')->where(['username'=>$username])->first();
        $checkTourist = DB::table('Tourist')->where(['username'=>$username])->first();
        $touristRating = 0;
        $guideRating = 0;
        $guideLocation = "";

        if(!empty($checkGuide)){
            $profileGuideLocation = DB::table('Guide')->select('guideLocation')->where(['username'=>$username])->get();
            $guideLocation = $profileGuideLocation[0]->guideLocation;
            $profileGuideRating = DB::table('Guide')->select('guideRating')->where(['username'=>$username])->get();
            $guideRating = $profileGuideRating[0]->guideRating;
            $trip = DB::select('select * from GuideTrip join Guide on GuideTrip.guideId=Guide.guideId where Guide.username="'.$username.'"');
        }
        if(!empty($checkTourist)){
            $profileTouristRating = DB::table('Tourist')->select('touristRating')->where(['username'=>$username])->get();
            $touristRating = $profileTouristRating[0]->touristRating;
            $trip = DB::select('select * from TouristTrip join Tourist on TouristTrip.touristId=Tourist.touristId where Tourist.username="'.$username.'"');
        }

        if($check){
            $userProfileImage = DB::table('Users')->select('userProfileImage')->where(['username'=>$username])->get();
            return view('FreeDay')->withUser($check,$checkGuide,$checkTourist)->with('guide',$checkGuide)->with('tourist',$checkTourist)->with('guideLocation',$guideLocation)->with('guideRating',$guideRating)->with('touristRating',$touristRating)->with('freeDay',$freeDay);
        }
    }

    public function ShowEditFreeDay($username){
        $user = DB::table('Users')->where(['username'=>$username])->first();
        $queryGuideId = DB::select("select guideId from Guide where username='".$username."'");
        $guideId = $queryGuideId[0]->guideId;
        $freeDay = DB::select("select freeday from GuideFreeDay where status='Free' and guideId='".$guideId."'");
        $check = DB::table('Users')->where(['username'=>$username])->first();
        $checkGuide = DB::table('Guide')->where(['username'=>$username])->first();
        $checkTourist = DB::table('Tourist')->where(['username'=>$username])->first();
        $touristRating = 0;
        $guideRating = 0;
        $guideLocation = "";

        if(!empty($checkGuide)){
            $profileGuideLocation = DB::table('Guide')->select('guideLocation')->where(['username'=>$username])->get();
            $guideLocation = $profileGuideLocation[0]->guideLocation;
            $profileGuideRating = DB::table('Guide')->select('guideRating')->where(['username'=>$username])->get();
            $guideRating = $profileGuideRating[0]->guideRating;
            $trip = DB::select('select * from GuideTrip join Guide on GuideTrip.guideId=Guide.guideId where Guide.username="'.$username.'"');
        }
        if(!empty($checkTourist)){
            $profileTouristRating = DB::table('Tourist')->select('touristRating')->where(['username'=>$username])->get();
            $touristRating = $profileTouristRating[0]->touristRating;
            $trip = DB::select('select * from TouristTrip join Tourist on TouristTrip.touristId=Tourist.touristId where Tourist.username="'.$username.'"');
        }

        if($check){
            $userProfileImage = DB::table('Users')->select('userProfileImage')->where(['username'=>$username])->get();
            return view('EditFreeDay')->withUser($check,$checkGuide,$checkTourist)->with('guide',$checkGuide)->with('tourist',$checkTourist)->with('guideLocation',$guideLocation)->with('guideRating',$guideRating)->with('touristRating',$touristRating)->with('freeDay',$freeDay);
        }
    }
}

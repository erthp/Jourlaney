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
            //$profileGuideRating = DB::table('Guide')->select('guideRating')->where(['username'=>$username])->get();
            //$guideRating = ($profileGuideRating[0]->guideRating,2);
            $trip = DB::select('select * from GuideTrip join Guide on GuideTrip.guideId=Guide.guideId where Guide.username="'.$username.'" order by GuideTrip.tripId desc');
            
            $getGuideId = DB::table('Guide')->select('guideId')->where(['username'=>$username])->get();
            $guideId = $getGuideId[0]->guideId;
            $allRating = DB::select("select distinct ord.guideRating as guideRating, ord.chatRoomId from TripOrder ord join ChatRoom c on ord.chatRoomId = c.chatRoomId where c.guideId=".$guideId." and ord.guideRating is not null");
            
            $i = 0;
            $intPlus = 0;
            foreach($allRating as $ar){
                $intRating = (double)($allRating[$i]->guideRating);
                $intPlus += $intRating;
                $i++;
            }
            if($intPlus != 0){
                $guideRating = number_format($intPlus/$i,2);
            }
        }
        if(!empty($checkTourist)){
            $getTouristId = DB::table('Tourist')->select('touristId')->where(['username'=>$username])->get();
            $touristId = $getTouristId[0]->touristId;
            $allRating = DB::select("select distinct ord.touristRating as touristRating, ord.chatRoomId from TripOrder ord join ChatRoom c on ord.chatRoomId = c.chatRoomId where c.touristId=".$touristId." and ord.touristRating is not null");
            
            $i = 0;
            $intPlus = 0;
            foreach($allRating as $ar){
                $intRating = (double)($allRating[$i]->touristRating);
                $intPlus += $intRating;
                $i++;
            }
            if($intPlus != 0){
                $touristRating = number_format($intPlus/$i,2);
            }
            $trip = DB::select('select * from TouristTrip join Tourist on TouristTrip.touristId=Tourist.touristId where Tourist.username="'.$username.'" order by TouristTrip.tripId desc');
        }

        if($check){
            $userProfileImage = DB::table('Users')->select('userProfileImage')->where(['username'=>$username])->get();
            return view('Profile', ['trip' => $trip])->withUser($check,$checkGuide,$checkTourist)->with('guide',$checkGuide)->with('tourist',$checkTourist)->with('guideLocation',$guideLocation)->with('guideRating',$guideRating)->with('touristRating',$touristRating);
        }
    }

    public function showRating($username){
        $check = DB::table('Users')->where(['username'=>$username])->first();
        $checkGuide = DB::table('Guide')->where(['username'=>$username])->first();
        $checkTourist = DB::table('Tourist')->where(['username'=>$username])->first();
        $touristRating = 0.00;
        $guideRating = 0.00;
        $guideLocation = "";

        if(!empty($checkGuide)){
            $profileGuideLocation = DB::table('Guide')->select('guideLocation')->where(['username'=>$username])->get();
            $guideLocation = $profileGuideLocation[0]->guideLocation;
                        
            $getGuideId = DB::table('Guide')->select('guideId')->where(['username'=>$username])->get();
            $guideId = $getGuideId[0]->guideId;
            $allRating = DB::select("select distinct ord.guideRating as guideRating, ord.chatRoomId from TripOrder ord join ChatRoom c on ord.chatRoomId = c.chatRoomId where c.guideId=".$guideId." and ord.guideRating is not null");
            
            $i = 0;
            $intPlus = 0;
            foreach($allRating as $ar){
                $intRating = (double)($allRating[$i]->guideRating);
                $intPlus += $intRating;
                $i++;
            }
            if($intPlus != 0){
                $guideRating = number_format($intPlus/$i,2);
            }

            $allReview = DB::select("select distinct ord.guideRating as guideRating, ord.guideReview as guideReview, ord.chatRoomId, c.touristId, u.username, u.userFirstName, u.userProfileImage from TripOrder ord join ChatRoom c on ord.chatRoomId = c.chatRoomId join Tourist t on c.touristId=t.touristId join Users u on t.username = u.username where c.guideId=".$guideId." and ord.guideRating is not null");
        }

        if(!empty($checkTourist)){
            $getTouristId = DB::table('Tourist')->select('touristId')->where(['username'=>$username])->get();
            $touristId = $getTouristId[0]->touristId;
            $allRating = DB::select("select distinct ord.touristRating as touristRating, ord.chatRoomId from TripOrder ord join ChatRoom c on ord.chatRoomId = c.chatRoomId where c.touristId=".$touristId." and ord.touristRating is not null");
            
            $i = 0;
            $intPlus = 0;
            foreach($allRating as $ar){
                $intRating = (double)($allRating[$i]->touristRating);
                $intPlus += $intRating;
                $i++;
            }
            if($intPlus != 0){
                $touristRating = number_format($intPlus/$i,2);
            }

            $allReview = DB::select("select distinct ord.touristRating as touristRating, ord.touristReview as touristReview, ord.chatRoomId, c.guideId, u.username, u.userFirstName, u.userProfileImage from TripOrder ord join ChatRoom c on ord.chatRoomId = c.chatRoomId join Tourist t on c.touristId=t.touristId join Users u on t.username = u.username where c.touristId=".$touristId." and ord.touristRating is not null");
        }

        if($check){
            $userProfileImage = DB::table('Users')->select('userProfileImage')->where(['username'=>$username])->get();
            return view('ProfileRatingReview')->withUser($check,$checkGuide,$checkTourist)->with('guide',$checkGuide)->with('tourist',$checkTourist)->with('guideLocation',$guideLocation)->with('guideRating',$guideRating)->with('touristRating',$touristRating)->with('allReview',$allReview);
        }
    }

    public function showOrderHistory(){
        $username = Session::get('username');
        $check = DB::table('Users')->where(['username'=>$username])->first();
        $checkGuide = DB::table('Guide')->where(['username'=>$username])->first();
        $guideId = Session::get('guideid');
        $guideRating = 0.00;
        $guideLocation = "";

        if(!empty($checkGuide)){
            $profileGuideLocation = DB::table('Guide')->select('guideLocation')->where(['username'=>$username])->get();
            $guideLocation = $profileGuideLocation[0]->guideLocation;
            $allRating = DB::select("select distinct ord.guideRating as guideRating, ord.chatRoomId from TripOrder ord join ChatRoom c on ord.chatRoomId = c.chatRoomId where c.guideId=".$guideId." and ord.guideRating is not null");
            
            $getGuideId = DB::table('Guide')->select('guideId')->where(['username'=>$username])->get();
            $guideId = $getGuideId[0]->guideId;
            
            $i = 0;
            $intPlus = 0;
            foreach($allRating as $ar){
                $intRating = (double)($allRating[$i]->guideRating);
                $intPlus += $intRating;
                $i++;
            }
            if($intPlus != 0){
                $guideRating = number_format($intPlus/$i,2);
            }
        }

        $query = DB::select("select distinct ord.*, u.userFirstName, gt.tripName from TripOrder ord join ChatRoom c on c.chatRoomId=ord.chatRoomId join GuideTrip gt on c.guideTripId=gt.tripId join Tourist t on c.touristId=t.touristId join Users u on t.username=u.username where c.guideId=".$guideId." and ord.status<>'Chat' order by c.chatTime desc");
        // dd($query);
        return view('ProfileOrder')->withUser($check)->with('query',$query)->with('guideLocation',$guideLocation)->with('guideRating',$guideRating);
    }
}

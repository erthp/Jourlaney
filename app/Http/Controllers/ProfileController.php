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
        }

        if($check){
            return view('Profile')->withUser($check,$checkGuide,$checkTourist);;
        }
    }
}

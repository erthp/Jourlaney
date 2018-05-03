<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class GuideRegisterController extends Controller
{
    public function guideregis(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $hash = hash('sha512',$password);
        $profilepic = $request->file('profilepic')->storeAs('/public/images/profilepic/', time().'.jpg');
        $filename = time() . '.jpg';
        $queryUser = DB::insert("insert into Users(username,userPassword,userFirstName,userLastName,userEmail,userGender,userDOB,userIdcard,userProfileImage) values(?,?,?,?,?,?,?,?,?)",[$username,$hash,$request->input('firstname'),$request->input('lastname'),$request->input('email'),$request->input('gender'),$request->input('birthdate'),$request->input('idcard'),$filename]);
        $queryGuide = DB::insert("insert into Guide(username,guideLicenseNumber) value(?,?)",[$request->input('username'),$request->input('guidelicense')]);
        return view('registercompleted');
    }


}

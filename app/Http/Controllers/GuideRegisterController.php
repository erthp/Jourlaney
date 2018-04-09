<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\GuideRegister;

class GuideRegisterController extends Controller
{
    public function guideregis(Request $request){
        $username = $request->input('username');
        $queryUser = DB::insert("insert into Users(username,userPassword,userFirstName,userLastName,userEmail,userGender,userDOB,userIdcard) values(?,?,?,?,?,?,?,?)",[$username,$request->input('password'),$request->input('firstname'),$request->input('lastname'),$request->input('email'),$request->input('gender'),$request->input('birthdate'),$request->input('idcard')]);
        $queryGuide = DB::insert("insert into Guide(username,guideLicenseNumber) value(?,?)",[$request->input('username'),$request->input('guidelicense')]);
        echo "ยัดลงดาตาเบสให้แล้วจ้ะ";
    }
}

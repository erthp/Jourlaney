<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Eloquent\EloquentGuideRepository as guideRepo;

class GuideRegisterController extends Controller
{
    public function guideregis(Request $request){ 
        $username = $request->input('username');
        $password = $request->input('password');
        $hash = hash('sha512',$password);

        $guideLicenseImage = $request->file('guidelicensepic');
        $input['filename'] = time().'.'.$guideLicenseImage->getClientOriginalExtension();
        $licensePath = public_path('/images/licensepic');
        $guideLicenseImage->move($licensePath, $input['filename']);
        $guideLicensePicName = $input['filename'];
        $queryUser = DB::insert("insert into Users(username,userPassword,userFirstName,userLastName,userEmail,userGender,userDOB,userIdcard) values(?,?,?,?,?,?,?,?)",[$username,$hash,$request->input('firstname'),$request->input('lastname'),$request->input('email'),$request->input('gender'),$request->input('birthdate'),$request->input('idcard')]);
        $queryGuide = DB::insert("insert into Guide(username,guideLicenseNumber,guideLicensePic) value(?,?,?)",[$request->input('username'),$request->input('guidelicense'),$guideLicensePicName]);
        return view('registercompleted');
    }


}

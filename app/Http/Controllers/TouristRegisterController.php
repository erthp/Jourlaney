<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\TouristRegister;

class TouristRegisterController extends Controller
{
    public function touristregis(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $hash = hash('sha512',$password);
        
        $touristIdCardImage = $request->file('touristidcardpic');
        $input['filename'] = time().'.'.$touristIdCardImage->getClientOriginalExtension();
        $picturePath = public_path('/images/idcardpic');
        $touristIdCardImage->move($picturePath, $input['filename']);
        $toursitIdCardPicName = $input['filename'];

        $queryUser = DB::insert("insert into Users(username,userPassword,userFirstName,userLastName,userEmail,userGender,userDOB,userIdcard) values(?,?,?,?,?,?,?,?)",[$username,$hash,$request->input('firstname'),$request->input('lastname'),$request->input('email'),$request->input('gender'),$request->input('birthdate'),$request->input('idcard')]);
        $queryTourist = DB::insert("insert into Tourist(username,touristIdCardPic) value(?,?)",[$request->input('username'),$toursitIdCardPicName]);
        return view('registercompleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Repositories\Eloquent\EloquentGuideRepository as guideRepo;

class GuideRegisterController extends Controller
{
    public function guideregis(Request $request){ 
        $username = $request->input('username');
        $password = $request->input('password');
        $hash = hash('sha512',$password);
        $userEmail = $request->input('email');
        $today = Carbon::today('Asia/Bangkok')->isoFormat('YYYY-MM-DD');

        $checkUsername = DB::table('Users')->where(['username'=>$username])->get();
        $checkEmail = DB::table('Users')->where(['userEmail'=>$userEmail])->get();
        if(count($checkUsername) ==0){
            if(count($checkEmail) ==0){
                if($request->input('birthdate') < $today){
                    $guideLicenseImage = $request->file('guidelicensepic');
                    $input['filename'] = time().'.'.$guideLicenseImage->getClientOriginalExtension();
                    $licensePath = public_path('/images/licensepic');
                    $guideLicenseImage->move($licensePath, $input['filename']);
                    $guideLicensePicName = $input['filename'];


                    $queryUser = DB::insert("insert into Users(username,userPassword,userFirstName,userLastName,userEmail,userGender,userDOB,userIdcard) values(?,?,?,?,?,?,?,?)",[$username,$hash,$request->input('firstname'),$request->input('lastname'),$request->input('email'),$request->input('gender'),$request->input('birthdate'),$request->input('idcard')]);
                    $queryGuide = DB::insert("insert into Guide(username,guideLicenseNumber,guideLicensePic) value(?,?,?)",[$request->input('username'),$request->input('guidelicense'),$guideLicensePicName]);
                    
                    // $guideId = $getGuideId[0]->guideId;
                    // $queryBankAccount = DB::insert("insert into GuideBankAccount(guideId,bankAccountNumber,bankAccountBank) value(?,?,?)",[$guideId,$request->input('accountno'),$request->input('bankname')]);
                    return view('registercompleted');
                }
                echo "<script>window.alert('Please use real birthday.')</script>";
                return view('guideregister');
            }
            else{
                echo "<script>window.alert('Dublicate email! Please change.')</script>";
                return view('guideregister');
            }
        }
        else{
            echo "<script>window.alert('Dublicate username! Please change.')</script>";
            return view('guideregister');
        }
    }
}

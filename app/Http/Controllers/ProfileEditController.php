<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ProfileEditController extends Controller
{
    public function editprofile(Request $request){
        $username = Session::get('username');
        $userEmail = $request->input('email');

        $checkUsername = DB::table('Users')->where(['username'=>$username])->get();
        $checkEmail = DB::table('Users')->where(['userEmail'=>$userEmail])->get();

        if(count($checkEmail) ==0 || $checkEmail[0]->userEmail==$userEmail){
            $queryUser = DB::update('update Users set userFirstName = ?, userLastName = ?, userEmail = ?, userDOB = ?, userIdcard = ? where username = ?', [$request->input('firstname'), $request->input('lastname'), $userEmail, $request->input('birthdate'), $request->input('idcard'),$username]);
            $firstname = DB::table('Users')->select('userFirstName')->where('username',$username)->get();
            Session::put('firstname', $firstname[0]->userFirstName);
            $lastname = DB::table('Users')->select('userLastName')->where('username',$username)->get();
            Session::put('lastname', $lastname[0]->userLastName);
            $email = DB::table('Users')->select('userEmail')->where('username',$username)->get();
            Session::put('email', $email[0]->userEmail);
            $gender = DB::table('Users')->select('userGender')->where('username',$username)->get();
            Session::put('gender', $gender[0]->userGender);
            $dob = DB::table('Users')->select('userDOB')->where('username', $username)->get();
            Session::put('dob', $dob[0]->userDOB);
            $idCard = DB::table('Users')->select('userIdcard')->where('username', $username)->get();
            Session::put('idCard', $idCard[0]->userIdcard);
            $guideid = DB::table('Guide')->select('guideId')->where('username',$username)->get();
            echo "<script>window.alert('Update completed.')</script>";
            return view('index');
        }
        else{
            echo "<script>window.alert('Dublicate email! Please change.')</script>";
            return view('EditProfile');
        }
    }
}

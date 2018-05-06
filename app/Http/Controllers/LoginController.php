<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Session;

class LoginController extends Controller
{
    public function login(Request $req){
        $username = $req->get('username');
        $password = $req->get('password');
        $hash = hash('sha512',$password);

        $check = DB::table('Users')->where(['username'=>$username,'userPassword'=>$hash])->get();
        if(count($check) >0){
            Session::start();
            $req->session()->put('username', $username);
            $firstname = DB::table('Users')->select('userFirstName')->where('username',$username)->get();
            Session::put('firstname', $firstname[0]->userFirstName);
            $lastname = DB::table('Users')->select('userLastName')->where('username',$username)->get();
            Session::put('lastname', $lastname[0]->userLastName);
            $guideid = DB::table('Guide')->select('guideId')->where('username',$username)->get();
            $touristid = DB::table('Tourist')->select('touristId')->where('username',$username)->get();
            if(isset($guideid[0])){
                Session::put('guideid', $guideid[0]->guideId);
                $guidelocation = DB::table('Guide')->select('guideLocation')->where('username',$username)->get();
                Session::put('guidelocation', $guidelocation[0]->guideLocation);
            }
            if(isset($touristid[0])){
                Session::put('touristid', $touristid[0]->touristId);
            }
            return redirect('/');

        }
        else{
            echo "<script>window.alert('Dublicate email! Please change.')</script>";
            return redirect('/');
        }
    }

    public function logout(Request $req){
        $req->session()->flush();
        return redirect('/');
    }
}

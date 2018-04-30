<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    public function login(Request $req){
        $username = $req->get('username');
        $password = $req->get('password');

        $check = DB::table('Users')->where(['username'=>$username,'userPassword'=>$password])->get();
        if(count($check) >0){
            session_start();
            $req->session()->put('username', $username);
            return redirect('/');
        }
        else{
            echo ('Invalid Username or Password.');
        }
    }

    public function logout(Request $req){
        $req->session()->flush();
        return redirect('/');
    }
}

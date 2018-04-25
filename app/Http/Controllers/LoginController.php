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
        if(!is_null($check)){
            session_start();
            $req->session()->put('username', $username);
            return redirect('/');
        }
        else{
            echo "login failed.";
        }
    }
}

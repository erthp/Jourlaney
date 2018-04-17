<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(request $req){
        $username = $req->input('username');
        $password = $req->input('password');

        $check = DB::table('Users')->where(['username'=>$username,'password'=>$password])->get();
        if(count($check) >0){
            echo "login";
        }
        else{

        }
    }
}

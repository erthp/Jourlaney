<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(request $req){
        $username = $req->get('username');
        $password = $req->get('password');

        $check = DB::table('Users')->where(['username'=>$username,'password'=>$password])->get();
        if(count($check) >0){
            echo "login";
        }
        else{

        }
    }
}

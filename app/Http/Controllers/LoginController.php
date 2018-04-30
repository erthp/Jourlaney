<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    public function login(Request $req){
        $username = $req->get('username');
        $password = $req->get('password');
        $hash = hash('sha512',$password);

        $check = DB::table('Users')->where(['username'=>$username,'userPassword'=>$hash])->get();
        if(count($check) >0){
            session_start();
            $req->session()->put('username', $username);
            $firstname = DB::select('select userFirstName from Users where username = :username', ['username'=>$username]);
            session()->put($firstname, $firstname);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Session;

class AdminController extends Controller
{
    public function login(Request $req){
        $username = $req->get('username');
        $password = $req->get('password');
        $hash = hash('sha512',$password);
        if($username='Admin'){
        $check = DB::table('Users')->where(['username'=>$username,'userPassword'=>$hash])->get();
        if(count($check) >0){
            Session::start();
            $req->session()->put('username', $username);
            $firstname = DB::table('Users')->select('userFirstName')->where('username',$username)->get();
            Session::put('firstname', $firstname[0]->userFirstName);
            $lastname = DB::table('Users')->select('userLastName')->where('username',$username)->get();
            Session::put('lastname', $lastname[0]->userLastName);
            return redirect('adminIndex');
        }
        else{
            echo ('Invalid Username or Password.');
        }
    }
        else{
            echo ('Invalid Username or Password.');
        }
    }

    public function logout(Request $req){
        $req->session()->flush();
        return redirect('/');
    }

    public function getdata(){
        $countUser = DB::table('Users')->count();
        dd($countUser);
    }
}

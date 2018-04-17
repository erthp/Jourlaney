<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(request $req){
        $username = $req->input('username');
        $password = $req->input('password');
    }
}

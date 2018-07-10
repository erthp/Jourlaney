<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request){
        $username = Session::get('username');
        $oldPassword = $request->get('oldPassword');
        $hashOldPassword = hash('sha512',$password);
    }    
}

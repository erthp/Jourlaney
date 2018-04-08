<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class GuideRegisterController extends Controller
{
    public function guideregis(Request $request){
        $queryUser = DB::insert("insert into Users(username,userPassword,userDOB) values(?,?,?)",[$request->input('username'),$request->input('password'),$request->input('birthdate')]);
        $queryGuide = DB::insert("insert into Guide(guideLicenseNumber) value(?)",[$request->input('guidelicense')]);
        echo $queryUser, $queryGuide;
    }
}

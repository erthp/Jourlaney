<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return view('index');
});

Route::get('guideregister',function(){
    return view('guideregister');
});

Route::get('touristregister',function(){
    return view('touristregister');
});

Route::get('header',function(){
    return view('header');
});

Route::get('profile',function(){
    return view('trips');
});

Route::get('freeday',function(){
    return view('freeday');
});

Route::get('registercompleted',function(){
    return view('registercompleted');
});

Route::get('createtrip',function(){
    return view('createtrip');
});

Route::get('profile',function(){
    return view('userprofile');
});

Route::post('/guideregis',"GuideRegisterController@guideregis");
Route::post('/touristregis',"TouristRegisterController@touristregis");
Route::post('/login',"LoginController@login");
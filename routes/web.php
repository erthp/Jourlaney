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
    return view('guideprofile');
});

Route::get('freeday',function(){
    return view('freeday');
});

Route::get('registercompleted',function(){
    return view('registercompleted');
});

Route::get('createtripcompleted',function(){
    return view('createtrip');
});

Route::get('guidecreatetrip',function(){
    return view('GuideCreateTrip');
});

Route::get('touristcreatetrip',function(){
    return view('TouristCreateTrip');
});

Route::get('GuideEditProfile',function(){
    return view('GuideEditProfile');
});

Route::get('admin',function(){
    return view('/Admin/admin');
});

Route::get('admin/index',function(){
    return view('/Admin/index');
});

Route::get('trip',function(){
    return view('Trip');
});

Route::post('/gcreatetrip',"GuideTripController@gcreatetrip");
Route::post('/guideregis',"GuideRegisterController@guideregis");
Route::post('/touristregis',"TouristRegisterController@touristregis");
Route::post('/geditprofile',"ProfileEditController@geditprofile");
Route::post('/teditprofile',"ProfileEditController@teditprofile");
Route::post('/login',"LoginController@login");
Route::post('/logout',"LoginController@logout");
Route::post('/adminLogin',"AdminLoginController@login");
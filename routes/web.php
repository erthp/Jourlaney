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

Route::get('Profile/{username}', 'ProfileController@showProfile')->name('Profile.showProfile');
Route::get('GuideTrip/{tripId}', 'TripController@showGuideTrip')->name('GuideTrip.ShowTrip');

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

Route::get('editprofile',function(){
    return view('EditProfile');
});

Route::get('admin',function(){
    return view('/Admin/admin');
});

Route::get('adminIndex',function(){
    return view('/Admin/index');
});

Route::get('adminGetData', 'AdminController@getdata');

<<<<<<< HEAD
Route::get('tripguide',function(){
    return view('TripofGuide');
});

Route::get('triptourist',function(){
    return view('TripofTourist');
});

=======
>>>>>>> 11e5d8c8ecd5baac41af56136127455c46b4b111
Route::post('/gcreatetrip',"GuideTripController@gcreatetrip");
Route::post('/guideregis',"GuideRegisterController@guideregis");
Route::post('/touristregis',"TouristRegisterController@touristregis");
Route::post('/editprofile',"ProfileEditController@editprofile");
Route::post('/login',"LoginController@login");
Route::post('/logout',"LoginController@logout");
Route::post('/adminLogin',"AdminController@login");
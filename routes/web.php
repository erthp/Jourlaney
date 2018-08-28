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

Route::get('footer',function(){
    return view('footer');
});

Route::get('headerNav',function(){
    return view('headerNav');
});

Route::get('Profile/{username}', 'ProfileController@showProfile')->name('Profile.showProfile');
Route::get('GuideTrip/{tripId}', 'TripController@showGuideTrip')->name('GuideTrip.ShowTrip');
Route::get('TouristTrip/{tripId}', 'TripController@showTouristTrip')->name('TouristTrip.ShowTrip');

Route::get('freeday',function(){
    return view('freeday');
});

Route::get('omise',function(){
    return view('omise');
});

Route::get('resetpassword',function(){
    return view('ResetPassword');
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

Route::get('GuideCreateTripDetails',function(){
    return view('GuideCreateTripDetails');
});

Route::get('GuideCreateTripTime',function(){
    return view('GuideCreateTripTime');
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
Route::get('search', 'SearchController@getdata');

Route::post('/gcreatetrip',"GuideTripController@guidecreatetrip");
Route::post('/gcreatetripdetails',"GuideTripController@GuideCreateTripDetails");
Route::post('/gcreatetriptime',"GuideTripController@GuideCreateTripTime");
Route::post('/gedittrip',"GuideTripController@guideedittrip");
Route::post('/gedittripdetails',"GuideTripController@GuideEditTripDetails");
Route::post('/gedittriptime',"GuideTripController@GuideEditTripTime");
Route::post('/guideregis',"GuideRegisterController@guideregis");
Route::post('/tcreatetrip',"TouristTripController@tcreatetrip");
Route::post('/touristregis',"TouristRegisterController@touristregis");
Route::post('/editprofile',"ProfileEditController@editprofile");
Route::post('/login',"LoginController@login");
Route::post('/logout',"LoginController@logout");
Route::post('/adminLogin',"AdminController@login");
Route::post('/guideverify',"AdminController@guideverify");
Route::post('/gdeletetrip',"TripController@gdeletetrip");
Route::post('/tdeletetrip',"TripController@tdeletetrip");
Route::post('/checkout',"OmiseCheckOutController@checkout");
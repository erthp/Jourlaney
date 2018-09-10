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
Route::get('guideShowEditTrip/{tripId}', 'TripController@guideShowEditTrip')->name('GuideShowEditTrip.ShowEditTrip');
Route::get('guideShowEditTripDetails/{tripId}', 'TripController@guideShowEditTripDetails')->name('GuideShowEditTripDetails.ShowEditTripDetails');
Route::get('TouristTrip/{tripId}', 'TripController@showTouristTrip')->name('TouristTrip.ShowTrip');

Route::get('freeday',function(){
    return view('freeday');
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

Route::get('guideedittrip',function(){
    return view('GuideEditTrip');
});

Route::get('GuideEditTripDetails',function(){
    return view('GuideEditTripDetails');
});

Route::get('GuideEditTripTime',function(){
    return view('GuideEditTripTime');
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

Route::get('charge', function () {
	return view ('omise');
});

Route::get('transfer', function () {
	return view ('omiseTransfer');
});



Route::post('/chargeOmise','OmiseCheckOutController@checkout');
Route::post('/transferOmise','OmiseTransferController@transfer');


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
Auth::routes();

Route::get('chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
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

Route::get('/', 'IndexController@getdata');
Route::get('th', 'IndexController@getdataTH');

Route::get('404',function(){
    return view('404');
});

Route::get('NoChat',function(){
    return view('NoChat');
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

Route::get('headerTH',function(){
    return view('header');
});

Route::get('footer',function(){
    return view('footer');
});

Route::get('headerNav',function(){
    return view('headerNav');
});

Route::get('Profile/{username}', 'ProfileController@showProfile')->name('Profile.showProfile');
Route::get('Rating/{username}', 'ProfileController@showRating')->name('Profile.showRating');
Route::get('EditFreeDay/{username}', 'ProfileController@showEditFreeDay')->name('Profile.showEditFreeDay');
Route::get('GuideTrip/{tripId}', 'TripController@showGuideTrip')->name('GuideTrip.ShowTrip');
Route::get('guideShowEditTrip/{tripId}', 'TripController@guideShowEditTrip')->name('GuideShowEditTrip.ShowEditTrip');
Route::get('guideShowEditTripDetails/{tripId}', 'TripController@guideShowEditTripDetails')->name('GuideShowEditTripDetails.ShowEditTripDetails');
Route::get('guideShowEditTripTime/{tripId}', 'TripController@guideShowEditTripTime')->name('GuideShowEditTripTime.ShowEditTripTime');
Route::get('touristShowEditTrip/{tripId}', 'TripController@touristShowEditTrip')->name('TouristShowEditTrip.ShowEditTrip');
Route::get('touristShowEditTripDetails/{tripId}', 'TripController@touristShowEditTripDetails')->name('TouristShowEditTripDetails.ShowEditTripDetails');
Route::get('touristShowEditTripTime/{tripId}', 'TripController@touristShowEditTripTime')->name('TouristShowEditTripTime.ShowEditTripTime');

Route::get('TouristTrip/{tripId}', 'TripController@showTouristTrip')->name('TouristTrip.ShowTrip');

Route::get('chat/{chatRoomId}', 'ChatController@ShowChat')->name('Chat.ShowChat');
Route::get('ShowChatOnly/{chatRoomId}', 'ChatController@ShowChatOnly')->name('Chat.ShowChatOnly');
Route::get('ShowChatPage', 'ChatController@ShowChatPage')->name('Chat.ShowChatPage');
//Route::get('ShowChatOnly', 'ChatController@ShowChatOnly')->name('Chat.ShowChatOnly');
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

Route::get('TouristCreateTripDetails',function(){
    return view('TouristCreateTripDetails');
});

Route::get('TouristCreateTripTime',function(){
    return view('TouristCreateTripTime');
});

Route::get('touristedittrip',function(){
    return view('TouristEditTrip');
});

Route::get('TouristEditTripDetails',function(){
    return view('TouristEditTripDetails');
});

Route::get('TouristEditTripTime',function(){
    return view('TouristEditTripTime');
});

Route::get('editprofile',function(){
    return view('EditProfile');
});

Route::get('ChatLayout',function(){
    return view('ChatLayout');
});

Route::get('admin',function(){
    return view('/Admin/admin');
});

Route::get('adminIndex',function(){
    return view('/Admin/index');
});

Route::get('adminReport',function(){
    return view('/Admin/report');
});

Route::get('login', ['as' => 'login', 'uses' => 'LoginController@login']);

Route::get('charge', function () {
	return view ('omise');
});

Route::get('transfer', function () {
	return view ('omiseTransfer');
});

Route::get('Report',function(){
    return view('Report');
});

Route::get('Mail', function () {
	return view ('Mail');
});

Route::get('ProfileOrder', function () {
	return view ('ProfileOrder');
});

Route::post('/Mail','PhpMailerController@Mail');

Route::post('/chargeOmise','OmiseCheckOutController@checkout');
Route::post('/transferOmise','OmiseTransferController@transfer');


Route::get('adminGetData', 'AdminController@getdata');
Route::get('adminGetDataReport', 'AdminController@getdataReport');
Route::get('orderHistory',"ProfileController@showOrderHistory");

Route::get('/search', 'SearchController@getdata');

//Admin Controllers
Route::post('/adminLogin',"AdminController@login");
Route::post('/guideverify',"AdminController@guideverify");

//User Controllers
Route::post('/guideregis',"GuideRegisterController@guideregis");
Route::post('/touristregis',"TouristRegisterController@touristregis");
Route::post('/login',"LoginController@login");
Route::post('/logout',"LoginController@logout");
Route::post('/editprofile',"ProfileEditController@editprofile");

//Trip Controllers
Route::post('/gcreatetrip',"GuideTripController@guidecreatetrip");
Route::post('/gcreatetripdetails',"GuideTripController@GuideCreateTripDetails");
Route::post('/gcreatetriptime',"GuideTripController@GuideCreateTripTime");

Route::post('/gedittrip',"GuideTripController@guideedittrip");
Route::post('/gedittripdetails',"GuideTripController@GuideEditTripDetails");
Route::post('/gedittriptime',"GuideTripController@GuideEditTripTime");

Route::post('/tcreatetrip',"TouristTripController@tcreatetrip");
Route::post('/tcreatetripdetails',"TouristTripController@TouristCreateTripDetails");
Route::post('/tcreatetriptime',"TouristTripController@TouristCreateTripTime");

Route::post('/tedittrip',"TouristTripController@touristedittrip");
Route::post('/tedittripdetails',"TouristTripController@TouristEditTripDetails");
Route::post('/tedittriptime',"TouristTripController@TouristEditTripTime");

Route::post('/gdeletetrip',"TripController@gdeletetrip");
Route::post('/tdeletetrip',"TripController@tdeletetrip");

//Chat Controllers
Route::post('/createChat',"ChatController@CreateChat");
Route::post('/sendChat',"ChatController@SendChat");
Route::get('/showChat', [
    'uses' => 'ChatController@ShowChat',
    'as' => 'showChat'
  ]);
Route::post('/reportForm',"ChatController@reportForm");
Route::post('/reportToAdmin',"ChatController@reportToAdmin");
Route::post('/searchChat',"ChatController@SearchChat");

//Payment Controllers
Route::post('/checkout',"OmiseCheckOutController@checkout");
Route::post('/createOrder',"OrderController@CreateOrder");
Route::post('/confirmOrder',"OrderController@ConfirmOrder");
Route::post('/cancelOrder',"OrderController@CancelOrder");
Route::post('/rateReview',"OrderController@RateReview");

//Route::post('/SendMail','PhpSendMailController@Sendmail');
// Auth::routes();

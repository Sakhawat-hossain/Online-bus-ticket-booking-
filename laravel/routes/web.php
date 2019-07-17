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

Route::get('/', 'homeController@homepage');
Route::get('/home', 'homeController@homepage');

//Route::get('signin', array('uses' => 'MyController@showLogin'));
Route::post('sign-in', 'MyController@doLogin');

Route::get('places','MyController@places' ); // log in controller
//Route::post('signin/{id}','MyController@checkuser' );

//Route::get('signup','MyController@signup' );

Route::resource('signin','LoginController');

Route::resource('user','UserController'); // sign up, show profile, edit profile

Route::resource('bus','BusController');

Route::post('search-buses','BusSearchController@search_bus'); // bus list without filter
Route::post('search-buses-with-filter','BusSearchController@search_bus_filter'); // bus list with filter
Route::get('/seat-list-details/{id}', 'BusSearchController@seat_list'); //seat list details
Route::get('booking-details/{id}/{tripID}', 'BusSearchController@booking'); //booking details
Route::post('payment-details/{id}/{tripID}', 'BusSearchController@payment'); //payment details

Route::get('/get-status/{id}','AjaxlController@getSeatStatus'); // get status of seat
Route::get('/update-status/{id}/{status}/{userID}','AjaxlController@updateStatus'); // update status of seat
Route::get('/get-userID/{id}','AjaxlController@getUserID'); // get userID
Route::get('/get-seat-list/{id}','AjaxlController@getSeatList'); // get seat list to show in profile

Route::get('/profile', function () {
    return view('user.profile');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/customers_view', function () {
    return view('admin.customers_view');
});
Route::get('/bookings_view', function (Request $request,$id,$tripID) {
    return view('admin.bookings_view');
});
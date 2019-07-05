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

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});

//Route::get('signin', array('uses' => 'MyController@showLogin'));
Route::post('sign-in', 'MyController@doLogin');

Route::get('places','MyController@places' ); // log in controller
//Route::post('signin/{id}','MyController@checkuser' );

//Route::get('signup','MyController@signup' );

Route::resource('signin','LoginController');

Route::resource('user','UserController');

Route::resource('bus','BusController');

Route::post('search-buses','BusSearchController@search_bus');

Route::get('/buslist', function () {
    return view('busList');
});

Route::get('/seatlist/{id}', function () {
    return view('seatList');
});

Route::get('/profile', function () {
    return view('user.profile');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/customers_view', function () {
    return view('admin.customers_view');
});
Route::get('/bookings_view', function () {
    return view('admin.bookings_view');
});
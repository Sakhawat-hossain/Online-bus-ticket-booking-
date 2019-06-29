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

Route::get('signin','MyController@signin' );

//Route::get('signup','MyController@signup' );

Route::resource('user','UserController');

Route::resource('bus','BusController');

Route::get('/buslist', function () {
    return view('busList');
});

Route::get('/seatlist/{id}', function () {
    return view('bus-seat.seatlist');
});

Route::get('/profile/{id}', function () {
    return view('user.profile');
});
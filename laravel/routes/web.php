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

//customer
Route::get('logout', 'MyController@logout'); // logout
Route::get('sign-in', 'MyController@showLogin'); // login
Route::post('sign-in', 'MyController@doLogin'); // login

//agents login, logout
Route::get('agent-logout', 'MyController@agentLogout'); // logout
Route::get('agent-sign-in', 'MyController@agentShowLogin'); // login
Route::post('agent-sign-in', 'MyController@agentDoLogin'); // login
Route::get('after-agent-register', 'MyController@agentRegister'); // login

//representatives login, logout
Route::get('representative-logout', 'MyController@reptLogout'); // logout
Route::get('representative-sign-in', 'MyController@reptShowLogin'); // login
Route::post('representative-sign-in', 'MyController@reptDoLogin'); // login
Route::get('representative-home', 'MyController@reptHome'); // representative-home

//admins login, logout
Route::get('admin-logout', 'MyController@adminLogout'); // logout
Route::get('admin-sign-in', 'MyController@adminShowLogin'); // login
Route::post('admin-sign-in', 'MyController@adminDoLogin'); // login
Route::get('after-admin-register', 'MyController@adminRegister'); // login
Route::get('confirm-ticket/{id}', 'MyController@adminConfirmTicket'); // login


Route::get('login-from-seatlist/{id}', 'MyController@loginFrom'); // login from buslist / seatlist
Route::post('login-from-seatlist/{id}', 'MyController@loginFromSeat'); // login from buslist / seatlist

Route::get('places','MyController@places' ); // places in controller


Route::resource('user','UserController'); // sign up, show profile, edit profile by users

Route::resource('agent','AgentController'); // sign up, show profile, edit profile by agents

Route::resource('representative','RepresentativeController'); // sign up, show profile, edit profile by representatives

Route::resource('bus','BusController');

// for user/customer
Route::post('search-buses','BusSearchController@search_bus'); // bus list without filter
Route::post('search-buses-with-filter','BusSearchController@search_bus_filter'); // bus list with filter
Route::get('/seat-list-details/{id}', 'BusSearchController@seat_list'); //seat list details
Route::post('booking-details/{id}/{tripID}', 'BusSearchController@booking'); //booking details
Route::post('payment-details/{id}/{tripID}', 'BusSearchController@payment'); //payment details

Route::post('confirm-ticket/{id}/{tripID}','BusSearchController@confirmTicket'); // confirm ticket

// for agent
Route::post('agent-search-buses-with-filter','BusSearchController@agent_search_bus_filter'); // bus list with filter
Route::get('agent-search-buses','BusSearchController@agent_search_bus'); // bus list with filter
Route::get('agent-seat-list-details/{id}', 'BusSearchController@agent_seat_list'); //seat list details
Route::post('agent-booking-details/{id}/{tripID}', 'BusSearchController@agent_booking'); //booking details
Route::post('agent-confirm-ticket/{id}/{tripID}/{userID}','BusSearchController@agent_confirmTicket'); // confirm ticket
Route::get('agent-confirm-ticket/{id}/{tripID}/{userID}','BusSearchController@send_from'); // confirm ticket

//for admin
Route::get('/admin','homeController@adminHomepage');
Route::get('search-ticket','BusSearchController@search_ticket'); // bus ticket with filter
Route::post('search-ticket-with-filter','BusSearchController@search_ticket_filter'); // bus ticket with filter

// for printing tickets
Route::get('show-ticket/{id}/{ticketID}','TicketPrintController@showTicket'); // show ticket
Route::get('download-ticket/{id}/{ticketID}','TicketPrintController@downloadTicket'); // download ticket
Route::get('cancel-ticket/{id}/{ticketID}','TicketPrintController@cancelTicket'); // cancel ticket
Route::get('cancel-refund-policy','TicketPrintController@cancelRefundPolicy'); // cancel-refund-policy ticket

// for ajax call
Route::get('/get-status/{id}','AjaxlController@getSeatStatus'); // get status of seat
Route::get('/update-status/{id}/{status}/{userID}','AjaxlController@updateStatus'); // update status of seat
Route::get('/get-userID/{id}','AjaxlController@getUserID'); // get userID
Route::get('/get-gender/{id}','AjaxlController@getUserGender'); // get user gender to show in seat list
Route::get('/get-seat-list/{id}','AjaxlController@getSeatList'); // get seat list to show in profile

Route::get('/get-bus-layout/{id}','AjaxlController@getBusLayout'); // get bus layout to show in rep. bus list

// for representative activities
Route::get('/representative-buses/{id}','RepActivityController@getBusList');// get buses of respective operator
Route::post('/representative-buses-with-filter/{id}','RepActivityController@getFilteredBusList');// get buses of respective operator
Route::get('/representative-add-buses/{id}','RepActivityController@addNewBus');// add new buses of respective operator
Route::post('/representative-add-buses-preview/{id}','RepActivityController@addNewBusPreview');// preview add new buses of respective operator
Route::post('/representative-edit-buses/{id}/{busID}','RepActivityController@editBus');// edit buses of respective operator
Route::get('/representative-trips/{id}','RepActivityController@search_trips');// get trips of respective operator
Route::get('/representative-add-trips/{id}','RepActivityController@addNewTrip');// add new buses of respective operator
Route::post('/representative-edit-trips/{id}/{tripID}','RepActivityController@editTrip');// edit buses of respective operator

Route::get('/profile', function () {
    return view('user.profile');
});

Route::get('/admin-home', function () {
    return view('admin.New folder.index');
});

Route::get('/customers_view', function () {
    return view('admin.customers_view');
});

Route::get('/bookings_view', function (Request $request,$id,$tripID) {
    return view('admin.bookings_view');
});
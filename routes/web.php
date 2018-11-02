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
use App\Cars;
/*
This use is so that we can access the cars Model. The cars model is located under something like D:\wamp64\www\ezshare\app\Cars.php
Model should be used to access the database.
*/


//Database interaction required for the page should be done in a controller page specific to the page you want like bookingController
//Stored in D:\wamp64\www\ezshare\app\Http\Controllers
Route::get('/carFleet','carFleetController@index');


//This accesses the home page of the website, use this sample if not using the database
Route::get('/', function () {
    return view('index');
});

Route::get('/unbook','unbookController@update');


Route::get('about', function(){
//I used the about page as a testing page for some basic stuff, feel free to overwrite it.

  return view('about');
  //This code is for testing, you should put this in a controller for this in something like D:\wamp64\www\ezshare\app\Http\Controllers\Auth\....
});

//This accesses the member map page of the website
Route::get('/map','mapController@index');
//This accesses the Admin map page of the website
Route::get('/adminMap','adminMapController@index');
Route::GET('/getCords', 'adminMapController@getCoords');
Route::get('/getDis', 'adminMapController@getDistance');



Route::get('/myAccount','myAccountController@index');

Route::get('faqs', function(){
  return view('faqs');
});

Route::get('contactUs', function(){
  return view('contactUs');
});


Route::post('/bookings','bookingsController@index');

Route::post('/payment','paymentController@show');

Route::get('signUp', function(){
  return view('signUp');
});
Route::post('/signUpCheck','signUpController@signupCheck');



Route::get('login', function(){
  return view('login');
});
Route::post('/loginCheck','loginController@index');

Route::get('/logout','loginController@logout');

Route::post('adminAddCarCheck', 'adminController@addCar');
Route::post('adminDeleteCarCheck', 'adminController@deleteCar');
Route::post('adminSetCar', 'adminController@setCarAvail');
Route::post('adminUnSetCar', 'adminController@setCarUnAvail');

Route::post('adminBookingsCheck', 'adminController@deleteBooking');

Route::get('adminDeleteCar', 'adminController@carDeletePage');
Route::get('adminBookings', 'adminController@bookingDeletePage');

Route::get('adminAddCar', function(){
  return view('adminAddCar');
});

Route::get('/receipt', function(){
  return view('/receipt');
});

Route::get('/receipt','receiptController@index');
?>

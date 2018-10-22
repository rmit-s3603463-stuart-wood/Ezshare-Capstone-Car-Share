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


Route::get('about', function(){
//I used the about page as a testing page for some basic stuff, feel free to overwrite it.
$users = DB::table('customers')->get();
$users2 = Cars::all();
  return view('about', compact('users2'));
  //This code is for testing, you should put this in a controller for this in something like D:\wamp64\www\ezshare\app\Http\Controllers\Auth\....
});

//This accesses the member map page of the website
Route::get('map', function(){
  return view('map');
});

//This accesses the Admin map page of the website
Route::get('adminMap', function(){
  return view('adminMap');
});

Route::get('myAccount', function(){
  return view('myAccount');
});

Route::get('faqs', function(){
  return view('faqs');
});

Route::get('contactUs', function(){
  return view('contactUs');
});


Route::get('bookings', function(){
  return view('bookings');
});

Route::get('payment', function(){
  return view('payment');
});

Route::get('login', function(){
  return view('login');
});

Route::get('signUp', function(){
  return view('signUp');
});

Route::get('adminAddCar', function(){
  return view('adminAddCar');
});

Route::get('adminDeleteCar', function(){
  return view('adminDeleteCar');
});

Route::get('adminBookings', function(){
  return view('adminBookings');
});
?>

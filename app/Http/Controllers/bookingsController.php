<?php

namespace App\Http\Controllers;

use App\Cars;
use App\Customers;
use App\Stations;
use App\Bookings;
use Illuminate\Http\Request;

class bookingsController extends Controller
{
    public function index(Request $request){
/*
-Grabs all the records from the car table and stores it into $Cars
-You must connect to a model to access the Database, Look at the above use App\Cars;
-make a model under app, try to name it after the table in the database - customer.php is a good example
*/
      //Gets all bookings from the database
      $bookings = Bookings::all();
      //Gets the rego from map page and sets it to the session
      $rego = $request->input('bookRego');
      session()->put('rego', $rego);
      $tempCar = Cars::where('rego', '=', $rego)->first();
      //Gets all cars from the database
      $cars = Cars::all();
      //Sets the current car
      $currentCar = Cars::where('rego', '=', $rego)->get();
      //Gets all customers from the database
      $customers = Customers::all();
      //Sets the current customer to the customer whose email is set in the session
      $currentCustomer = Customers::where('email', '=', $request->session()->get('email'))->get();
      session()->put('stationName', $tempCar->stationName);
      //Gets all stations from the database
      $stations = Stations::all();
      $currentStation = Stations::where('stationName', '=', $tempCar->stationName)->get();
      //return the view to the page that it's going to access and send back the variables without the $ like below.
      session()->put('test', 'message');
      return view('bookings', compact('bookings','cars','stations','currentCar','currentCustomer','currentStation'));

    }


}

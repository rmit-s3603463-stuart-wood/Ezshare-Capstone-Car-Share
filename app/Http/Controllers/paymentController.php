<?php

namespace App\Http\Controllers;

use App\Cars;
use App\Customers;
use App\Stations;
use App\Bookings;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function index(){
/*
-Grabs all the records from the car table and stores it into $Cars
-You must connect to a model to access the Database, Look at the above use App\Cars;
-make a model under app, try to name it after the table in the database - customer.php is a good example
*/


    }

    public function show(Request $request){

      $cars = Cars::all();
      $currentCar = Cars::where('rego', '=', session()->get('rego'))->get();

      $customers = Customers::all();
      $currentCustomer = Customers::where('email', '=', session()->get('email'))->get();

      $stations = Stations::all();
      $currentStation = Stations::where('stationName', '=', session()->get('stationName'))->get();

      $request->session()->put('plocation', $request->input('plocation'));

      $request->session()->put('dlocation', $request->input('dlocation'));

      $request->session()->put('fdatetime', $request->input('fdatetime'));

      $request->session()->put('tdatetime', $request->input('tdatetime'));

      $request->session()->put('fname', $request->input('fname'));

      $request->session()->put('lname', $request->input('lname'));

      $request->session()->put('email', $request->input('email'));

      $request->session()->put('phone', $request->input('phone'));

      $request->session()->put('rego', $request->input('rego'));

      $request->session()->put('pdate', $request->input('pdate'));

      $request->session()->put('ptime', $request->input('ptime'));

      $request->session()->put('ddate', $request->input('ddate'));

      $request->session()->put('dtime', $request->input('dtime'));

      $request->session()->put('mins', $request->input('mins'));

      $request->session()->put('hrs', $request->input('hrs'));

      $request->session()->put('gtotal', $request->input('gtotal'));

      $request->session()->put('completed', $request->input('completed'));

      return view('payment', compact('cars','stations','currentCar','currentCustomer','currentStation'));
    }

    public function form() {
    return $this->index(); $this->show();

}
}

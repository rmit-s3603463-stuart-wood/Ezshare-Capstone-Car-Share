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


    }

    public function show(Request $request){
      // Gets all cars from Database and sets current car based on the rego stored in session
      $cars = Cars::all();
      $currentCar = Cars::where('rego', '=', session()->get('rego'))->get();
      // Gets all cars from Database and sets currentCustomer based on email set in session
      $customers = Customers::all();
      $currentCustomer = Customers::where('email', '=', session()->get('email'))->get();
      // Gets all cars from Database and sets stationName based on the stationName set in session
      $stations = Stations::all();
      $currentStation = Stations::where('stationName', '=', session()->get('stationName'))->get();

      // Setting the session of all form elements form payment page
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

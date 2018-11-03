<?php

namespace App\Http\Controllers;

use App\Cars;
use App\Customers;
use App\Stations;
use App\Bookings;
use Illuminate\Http\Request;

class receiptController extends Controller
{
    public function index(Request $request){

//Sets attribute 'booked' in the cars table from database to '1'
$rego=$request->session()->get('rego');
$setCar = Cars::where('rego', '=', $rego)->get();
$setCar[0]->booked = 1;
$setCar[0]->currDriver = $request->session()->get('email');
$completed = 0;

//Writes the booking information to the database
$carshare = new Bookings([
  'email'  =>  $request->session()->get('email'),
  'rego'  =>  $request->session()->get('rego'),
  'dateBooked' => $request->session()->get('pdate'),
  'timeBooked' => $request->session()->get('ptime'),
  'hoursBooked' => $request->session()->get('hrs'),
  'minutesBooked' => $request->session()->get('mins'),
  'totalPrice' => $request->session()->get('gtotal'),
  'returnLocation' => $request->session()->get('dlocation'),
  'pickupLocation' => $request->session()->get('plocation'),
  'completed' => $completed
]);
$carshare -> save();
$setCar[0]-> save();
return view('receipt', compact('cars','stations','currentCar','currentCustomer','currentStation'));


    }


}

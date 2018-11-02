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
/*
-Grabs all the records from the car table and stores it into $Cars
-You must connect to a model to access the Database, Look at the above use App\Cars;
-make a model under app, try to name it after the table in the database - customer.php is a good example
*/

$rego=$request->session()->get('rego');
$setCar = Cars::where('rego', '=', $rego)->get();
$setCar[0]->booked = 1;
$setCar[0]->currDriver = $request->session()->get('email');
$completed = 0;
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

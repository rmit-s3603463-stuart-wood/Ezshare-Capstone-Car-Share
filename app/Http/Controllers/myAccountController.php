<?php

namespace App\Http\Controllers;

use App\Cars;
use App\Bookings;
use App\Customers;

use Illuminate\Http\Request;

class myAccountController extends Controller
{
    public function index(Request $request){
/*
Grabs data relevant for the myAccount page and returns it.
*/

      $currentCustomer = Customers::where('email', '=', $request->session()->get('email'))->get();
      $bookings = Bookings::where('email', '=', $request->session()->get('email'))->get();


      return view('myAccount', compact('bookings', 'currentCustomer'));



    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cars;
use App\Customers;

class mapController extends Controller
{
  public function index(){
    /*
    Grabs data relevant for the map page and returns it
    */

  $cars = Cars::all();
  $customers = Customers::all();

  return view('map', compact('cars','customers'));

}

}

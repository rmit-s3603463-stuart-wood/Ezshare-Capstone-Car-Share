<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cars;
use App\Customers;

class mapController extends Controller
{
  public function index(){

  $cars = Cars::all();
  $customers = Customers::all();

  return view('map', compact('cars','customers'));

}

}

<?php

namespace App\Http\Controllers;

use App\Cars;
use Illuminate\Http\Request;

class carFleetController extends Controller
{
    public function index(){
      /*
      Grabs data relevant for the carFleet page and returns it
      */
      $cars = Cars::all();
      $tier1Cars = Cars::where('tier', '=', 1)->get();
      $tier2Cars = Cars::where('tier', '=', 2)->get();
      $tier3Cars = Cars::where('tier', '=', 3)->get();
      //return the view to the page that it's going to access and send back the variables without the $ like below.
      return view('carFleet', compact('cars','tier1Cars','tier2Cars','tier3Cars'));



    }
}

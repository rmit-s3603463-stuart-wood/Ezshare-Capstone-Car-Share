<?php

namespace App\Http\Controllers;

use App\Cars;
use Illuminate\Http\Request;

class carFleetController extends Controller
{
    public function index(){
/*
-Grabs all the records from the car table and stores it into $Cars
-You must connect to a model to access the Database, Look at the above use App\Cars;
-make a model under app, try to name it after the table in the database - customer.php is a good example
*/
      $cars = Cars::all();
      $tier1Cars = Cars::where('tier', '=', 1)->get();
      $tier2Cars = Cars::where('tier', '=', 2)->get();
      $tier3Cars = Cars::where('tier', '=', 3)->get();
      //return the view to the page that it's going to access and send back the variables without the $ like below.
      return view('carFleet', compact('cars','tier1Cars','tier2Cars','tier3Cars'));



    }
}

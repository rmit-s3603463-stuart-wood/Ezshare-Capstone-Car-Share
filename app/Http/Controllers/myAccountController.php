<?php

namespace App\Http\Controllers;

use App\Cars;
use App\Bookings;
use App\Customers;

use Illuminate\Http\Request;

class myAccountController extends Controller
{
    public function index(){
/*
-Grabs all the records from the car table and stores it into $Cars
-You must connect to a model to access the Database, Look at the above use App\Cars;
-make a model under app, try to name it after the table in the database - customer.php is a good example
*/
      $bookings = Bookings::all();
      $customers = Customers::all();


      //return the view to the page that it's going to access and send back the variables without the $ like below.
      return view('myAccount', compact('bookings','customers'));



    }
}

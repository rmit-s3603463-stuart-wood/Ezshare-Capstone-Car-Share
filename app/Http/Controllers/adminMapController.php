<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cars;
use App\Customers;

class adminMapController extends Controller
{
  public function index(){

  $cars = Cars::all();
  $customers = Customers::all();

  return view('adminMap', compact('cars','customers'));

}
public function getCoords(){

  $cars = Cars::all();
  $Loc=$cars->pluck('carCords');

return response()->json($Loc);

}
public function getDistance(){



return view('adminMap', compact('cars','customers'));

}
public function setDistance(){


}
}

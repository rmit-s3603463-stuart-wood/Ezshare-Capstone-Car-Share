<?php

namespace App\Http\Controllers;

use App\Cars;
use App\Bookings;
use App\Customers;
use App\Stations;
Use Redirect;


use Illuminate\Http\Request;

class adminController extends Controller
{
  public function addCarPage(){

          $stations = Stations::all();
          return view('adminAddCar', compact('stations'));

}


  public function carDeletePage(){

          $cars = Cars::all();
          return view('adminDeleteCar', compact('cars'));

}
public function bookingDeletePage(){

        $bookings = Bookings::all();
        return view('adminBookings', compact('bookings'));

}
    public function addCar(Request $request){
      /*
      -Variables are grabbed from the form and validated, if a validation fails then an error is added to an error array.
      -If no errors exist then the admin successfully adds a car otherwise they're sent back to the adminAddCar page and shown the error messages.
      */
      $errors = array();

      // Add Car
      if (isset($_POST['submit'])) {
        // receive all input values from the form
              if(request()->has('rego')){
                $rego = request('rego');
                if (Cars::where('rego', '=',$rego)->exists()) {
                  array_push($errors, "This Rego is already being used! Please try again.");

                }
              }else{
                array_push($errors, "A car Rego is required!");
              }

                if(request()->has('model')){
                $model = request('model');

              }else{
                array_push($errors, "A car model is required!");

              }

                if(request()->has('price')){
                $price = request('price');

              }else{
                array_push($errors, "A price per hour is required!");

              }

                if(request()->hasFile('carPic')){

                $file = $request->file('carPic');
                $carPic = $file->getClientOriginalName();

            }else{
              array_push($errors, "A car picture is required!");

            }

              if(request()->has('totalkm')){
                $totalkm = request('totalkm');

              }else{
                array_push($errors, "A total km driven is required!");
              }

              $make = request('make');
              $year = request('year');
              $tier = request('tier');
              $seatNo = request('seatNo');
              $engine = request('engine');
              $stationName = request('stationName');
            }
            $currStation=Stations::where('stationName', '=', $stationName)->first();
            $carCords=$currStation->cords;


        $booked = intval(FALSE);
        $availability = true;
        $journeykm = '0';
        $currDriver = "No Driver";


        // first check the database to make sure
        // a car does not already exist with the same rego





        if (count($errors) == 0) {
      				  echo"";
                list($fileName,$fileExt) = explode('.', $carPic);
      				  $fileActualExt = strtolower($fileExt);
      				  $allowed = array('jpg', 'jpeg', 'png', 'pdf');
      				  if(in_array($fileActualExt, $allowed))
      				  {
      					  $fileNameNew = uniqid(true).".".$fileName.".".$fileActualExt;



                  $request->carPic->move(public_path('img'), $fileNameNew);

                Cars::Create([

                  'rego' => $rego,
                  'model' => $model,
                  'make' => $make,
                  'year' => $year,
                  'tier' => $tier,
                  'seatNo' => $seatNo,
                  'engine' => $engine,
                  'price' => $price,
                  'carPic' => $fileNameNew,
                  'stationName' => $stationName,
                  'carCords' => $carCords,
                  'booked' => $booked,
                  'availability' => $availability,
                  'totalkm' => $totalkm,
                  'journeykm' => $journeykm,
                  'currDriver' => $currDriver

                ]);

      						echo '<script language="javascript">';
      						echo 'alert("car has been added to database")';
      						echo '</script>';
      				  }
      			  }else{				echo '<script language="javascript">';
      				echo 'alert("An error has been detected! Car not added to the database")';
      				echo '</script>';
      			  }





      //return the view to the page that it's going to access and send back the variables without the $ like below.
      return Redirect::back()->with('errors',$errors);



    }
    public function deleteBooking(Request $request){
      $Bookings = Bookings::where('bookingID', '=', request('userBooking'))->get();
      //unbooks the car by setting the car to an 'empty' state and deletes the booking.

      foreach ($Bookings as $Booking) {
        $setCar = Cars::where('rego', '=', $Booking->rego)->get();
        $setCar[0]->currDriver = 'No Driver';
        $setCar[0]->booked = 0;
        $setCar[0]->totalkm += $setCar[0]->journeykm;
        $setCar[0]->journeykm = 0;
        if($Booking->completed==0){
          $Booking ->delete();
        }

    }
    $setCar[0]->save();
    return Redirect('/adminBookings');

}
public function setCarAvail(Request $request){
  //sets the car to available

  $setCar = Cars::where('rego', '=', request('carRego'))->get();
  $setCar[0]->availability = 1;
  $setCar[0]->save();
  return Redirect('/adminDeleteCar');


}
public function setCarUnAvail(Request $request){
  //unbooks the car by setting the car to an 'empty' state and sets the car to unavailable

  $Bookings = Bookings::where('rego', '=', request('carRego'))->get();
  $setCar = Cars::where('rego', '=', request('carRego'))->get();
  $setCar[0]->availability = 0;
  $setCar[0]->currDriver = 'No Driver';
  $setCar[0]->booked = 0;
  $setCar[0]->totalkm += $setCar[0]->journeykm;
  $setCar[0]->journeykm = 0;
  foreach ($Bookings as $Booking) {
    if($Booking->completed==0){
      $Booking ->delete();
    }
}

  $setCar[0]->save();
  return Redirect('/adminDeleteCar');


}
public function deleteCar(Request $request){
  //deletes the car and any bookings associated with it

  $Bookings = Bookings::where('rego', '=', request('carRego'))->get();
  $setCar = Cars::where('rego', '=', request('carRego'))->get();

  foreach ($Bookings as $Booking) {
    if($Booking->completed==0){
      $Booking ->delete();
    }
}
$setCar[0] ->delete();

  return Redirect('/adminDeleteCar');

}
}
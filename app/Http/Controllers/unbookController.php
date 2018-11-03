<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cars;
use App\Bookings;

class unbookController extends Controller
{

    public function update()
    {
    //unbooks the car by setting the car to an 'empty' state and setting the booking to completed

        $BookedCar = Cars::where('rego', '=', request('carRego'))->get();
        $Booking = Bookings::where('bookingID', '=', request('bookId'))->get();

        $BookedCar[0]->totalkm += $BookedCar[0]->journeykm;
        $BookedCar[0]->currDriver = 'No Driver';
        $BookedCar[0]->journeykm = 0;
        $BookedCar[0]->booked = 0;
        $Booking[0]->completed = 1;
        $BookedCar[0]->save();
        $Booking[0]->save();

        return Redirect('/myAccount');

    }



}

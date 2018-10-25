<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cars;
use App\Bookings;

class unbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //$BookedCar = Cars::find(request('carRego'));
        //$Booking = Bookings::find(request('bookID'));

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App;

class Bookings extends Model
{
  protected $fillable = ['rego', 'email', 'dateBooked', 'timeBooked', 'hoursBooked', 'minutesBooked', 'totalPrice', 'returnLocation', 'pickupLocation', 'completed'];
  public $primaryKey  = 'bookingID';
}

<?php

//php artisan tinker
//php artisan make:model Cars
// App\Cars::all()
namespace App;


class Stations extends Model
{
  public $primaryKey  = 'stationName';
  public $incrementing = false;
}

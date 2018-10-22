<?php

//php artisan tinker
//php artisan make:model Cars
// App\Cars::all()
namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    public function scopegetCurrDriver($query){
//> App\Cars::getCurrDriver()->get();
      return $query -> where('rego', 'SED123');
    }
    public function scopegetRego($query){

    }
    public function scopegetCarPic($query){

    }
    public function scopegetBooked($query){

    }
    public function scopegetAvailability($query){

    }

    public function updateCurrDriver(){

    }
    public function updateJourneyKm(){

    }
    public function updateTotalKm(){

    }
    public function updateCoords(){

    }
    public function updateStation(){

    }
    public function resetCurrDriver(){

    }
    public function resetjourneyKm(){

    }
    public function setBooked(){

    }
    public function setAvailable(){

    }
    public function unsetBooked(){

    }
    public function unsetAvailable(){

    }

}

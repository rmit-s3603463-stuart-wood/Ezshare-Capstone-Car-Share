<?php

//php artisan tinker
//php artisan make:model Cars
// App\Cars::all()
namespace App;

class Cars extends Model
{
  public $primaryKey  = 'rego';
  public $incrementing = false;
}

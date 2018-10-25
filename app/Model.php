<?php

//php artisan tinker
//php artisan make:model Cars
// App\Cars::all()
namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
  public $timestamps = false;
}

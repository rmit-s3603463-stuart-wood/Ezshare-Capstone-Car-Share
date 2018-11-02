<?php

//php artisan tinker
//php artisan make:model Cars
// App\Cars::all()
namespace App;


class Customers extends Model
{
  protected $fillable = ['email', 'password', 'firstName', 'lastName', 'phone', 'dateOfBirth', 'street', 'suburb', 'state', 'postcode', 'country', 'isAdmin'];
  public $primaryKey  = 'email';
  public $incrementing = false;
}

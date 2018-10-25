<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
  //
  //php artisan migrate - migrates the tables located in migrations
  //php artisan migrate:refresh - re-migrates the tables
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {

            $table->increments('bookingID');
            $table->string('rego', 35);
            $table->string('email', 200);
            $table->string('dateBooked', 75);
            $table->string('timeBooked', 75);
            $table->string('hoursBooked', 75);
            $table->string('minutesBooked', 75);
            $table->string('totalPrice', 75);
            $table->string('returnLocation', 150);
            $table->string('pickupLocation', 150);
            $table->boolean('completed');

            $table->foreign('email')->references('email')->on('customers');
            $table->foreign('rego')->references('rego')->on('cars');
            $table->foreign('pickupLocation')->references('stationName')->on('stations');
            $table->foreign('returnLocation')->references('stationName')->on('stations');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}

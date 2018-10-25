<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
          $table->string('rego', 35);
          $table->string('model', 35);
          $table->string('make', 35);
          $table->string('year', 25);
          $table->boolean('tier', 25);
          $table->string('seatNo', 25);
          $table->string('engine', 50);
          $table->string('price', 50);
          $table->string('carPic', 150);
          $table->string('stationName', 150);
          $table->string('carCords', 200);
          $table->boolean('booked');
          $table->boolean('availability');
          $table->string('totalkm', 30);
          $table->string('journeykm', 30);
          $table->string('currDriver', 40);

          $table->primary('rego');
          $table->foreign('stationName')->references('stationName')->on('stations');
          $table->foreign('currDriver')->references('email')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}

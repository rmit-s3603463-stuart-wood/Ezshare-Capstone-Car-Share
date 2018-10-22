<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('email', 200);
            $table->string('password', 200);
            $table->string('firstName', 25);
            $table->string('lastName', 25);
            $table->string('phone', 20);
            $table->string('dateOfBirth', 20);
            $table->string('street', 20);
            $table->string('suburb', 50);
            $table->string('state', 30);
            $table->string('postcode', 20);
            $table->string('country', 20);
            $table->boolean('isAdmin');
            $table->primary('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('auto_id');
            $table->date('date');
            $table->string('route');
            $table->time('timeStart');
            $table->time('timeToCustomer');
            $table->time('timeFromCustomer');
            $table->time('timeEnd');
            $table->integer('spidometerStart');
            $table->integer('spidometerEnd');
            $table->integer('timeunload');
            $table->integer('distance');
            $table->double('fuel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}

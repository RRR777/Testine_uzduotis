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
            $table->integer('user_id')->unsigned();
            $table->integer('auto_id')->unsigned();
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

        Schema::table('trips', function (Blueprint $table) {
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->foreign('auto_id')
                  ->references('id')->on('autos')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
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

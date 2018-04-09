<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('number');
            $table->integer('stop');
            $table->integer('drive');
            $table->integer('unload');
            $table->integer('creator_id')->unsigned()->nullable();
            $table->integer('updator_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('autos', function (Blueprint $table) {
            $table->foreign('creator_id')
                  ->references('id')->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('updator_id')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('autos');
    }
}

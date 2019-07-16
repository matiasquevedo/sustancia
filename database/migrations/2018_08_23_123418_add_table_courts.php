<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableCourts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cantidad_jugadores');
            $table->string('precio');

            //clave foranea
            $table->integer('busines_id')->unsigned();
            $table->foreign('busines_id')->references('id')->on('business')->onDelete('cascade');
            
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
        //
    }
}

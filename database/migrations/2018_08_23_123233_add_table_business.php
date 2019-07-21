<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableBusiness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('markets', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('name')->nullable();
            $table->enum('state',['0','1','2'])->default('0');
            $table->enum('mp',['0','1'])->default('0');
            $table->longText('descripcion')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('latitude')->unique();
            $table->string('longitude')->unique();
            
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
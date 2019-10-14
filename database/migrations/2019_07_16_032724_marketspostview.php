<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Marketspostview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement("CREATE VIEW marketspostview AS SELECT markets.id, 
                                markets.name, 
                                markets.descripcion,
                                markets.mp, 
                                markets.ubicacion, 
                                markets.latitude, 
                                markets.longitude, 
                                markets.created_at, 
                                markets.updated_at,
                                markets.locality,
                                markets.subAdministrativeArea,
                                image_maps.img,
                                image_maps.market_id,
                                image_maps.url,
                                image_maps.tumb
                                FROM markets, image_maps
                                WHERE state = '1' 
                                AND image_maps.market_id = markets.id
                                ORDER BY markets.updated_at DESC;");       

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

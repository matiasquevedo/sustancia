<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imageMap extends Model
{
    //
    protected $table = "image_maps";

    protected $fillable = ['id','img','url','market_id'];

    public function market(){
    	return $this->belongsTo('App\Market');
    }
    
    
}

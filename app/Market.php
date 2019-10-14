<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    //

        protected $table = "markets";

        protected $fillable = ['id','name','ubicacion','state','mp','descripcion','latitude','longitude','locality','subAdministrativeArea'];

        public function user(){
        	return $this->belongsTo('App\User');
        }

        public function image(){
            return $this->hasOne('App\imageMap');
        }
    	
}

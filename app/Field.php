<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    //
	protected $table = "fields";

	protected $fillable = ['id','cantidad_jugadores','precio','busines_id'];

	public function busines(){
		return $this->belongsTo('App\Busines');
	}

	public function turns(){
		return $this->hasMany('App\Turn');
	}
}

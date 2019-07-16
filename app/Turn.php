<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    //
    protected $table = "turns";

    protected $fillable = ['id','fecha','hora','state','field_id'];

    public function field(){
    	return $this->belongsTo('App\Field');
    }

    public function bookings(){
    	return $this->hasMany('App\Booking');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $table = "reservations";

    protected $fillable = ['id','precioTotal','user_id'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function bookings(){
    	return $this->hasMany('App\Booking');
    }
}

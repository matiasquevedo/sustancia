<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $table = "bookings";

    protected $fillable = ['id','turn_id','reservation_id'];

    public function turn(){
    	return $this->belongsTo('App\Turn');
    }

    public function reservation(){
    	return $this->belongsTo('App\Reservation');
    }
}

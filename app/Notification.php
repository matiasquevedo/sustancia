<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $table = "notifications";

    protected $fillable = ['id','title','body','topic','user_id'];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function business(){
        return $this->hasMany('App\Busines');
    }

    public function reservations(){

        return $this->hasMany('App/Reservation');
    }

    public function admin(){
        return $this->type === 'admin';
    }

    public function encargado(){
        return $this->type === 'encargado';
    }

    public function cliente(){
        return $this->type === 'cliente';
    }
}

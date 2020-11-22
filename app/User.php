<?php

namespace BasoCoop;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use BasoCoop\Roles;
use BasoCoop\Cooperativa;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','ci','login', 'primeravez',  'fecha_act_psw','id_rol','id_coop'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   /* protected $hidden = [
        'password', 'remember_token',
    ];*/

    public function Rol(){
        return $this->belongsTo('BasoCoop\Roles','id_rol');
    }
    public function Cooperativa(){


        return $this->belongsTo('BasoCoop\Cooperativa','id_coop');
    }

}

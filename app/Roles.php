<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;
use BasoCoop\User;
use BasoCoop\Privilegios;

class Roles extends Model
{
    //
    protected $table = 'roles';

    protected $fillable = [
        'nomb_rol', 'descrip'
    ];
    public function Usuarios(){
        return $this->hasMany(User::class,'id_rol');
    }
    public function Privilegios(){
        return $this->hasMany(Privilegios::class,'id_rol');
    }



}

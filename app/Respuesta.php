<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable = [
        'id_pregunta','id_encuesta','respuesta'
    ];


    protected $hidden = [

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */



}

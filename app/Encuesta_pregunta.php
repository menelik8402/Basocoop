<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Encuesta_pregunta extends Model
{
    protected $table = 'encuestapregunta';
    protected $fillable = [
        'id_pregunta','id_encuesta'
    ];

    protected $hidden = [

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}


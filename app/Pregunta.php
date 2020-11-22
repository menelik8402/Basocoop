<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'pregunta';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'pregunta','tipo'
    ];


    protected $hidden = [

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}

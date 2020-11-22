<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Var_II extends Model
{
    protected $table = 'var_II';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_principio' //'cond_educativa', 'cond_legal'  aqui no tiene nada pq solo tiene como campo un id incremental, eso puede ser????
    ];

    protected $hidden = [


    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Var_I extends Model
{
    protected $table = 'var_I';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_principio' //'cond_legal'  aqui no tiene nada pq solo tiene como campo un id incremental, eso puede ser????
    ];

    protected $hidden = [

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

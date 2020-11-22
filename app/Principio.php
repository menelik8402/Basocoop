<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Principio extends Model
{
    protected $table = 'principio';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_principio'
    ];

    protected $hidden = [

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

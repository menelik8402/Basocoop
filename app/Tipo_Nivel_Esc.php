<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Tipo_Nivel_Esc extends Model
{
    protected $table = 'tipo_nivel_esc';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_nivel_esc'
    ];

    protected $hidden = [

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

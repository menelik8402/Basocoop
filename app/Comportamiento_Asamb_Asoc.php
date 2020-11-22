<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;
use BasoCoop\Ano;
class Comportamiento_Asamb_Asoc extends Model
{
    protected $table = 'comportamientoasambasoc';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'convocadas', 'efectuadas' , 'delegados' , 'asistieron','id_ano'
    ];
    public function Ano(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }
    protected $hidden = [

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

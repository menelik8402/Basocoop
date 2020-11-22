<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class EquiGenNivDir extends Model
{
    //

    protected $table = 'EquiGenNivDir';

    protected $fillable = [
        'hombres', 'mujeres', 'id_ano', 'id_cooperativa'
    ];

    public function Ano(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }
}

<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class rotacionasoc extends Model
{

    protected $table = 'rotacionasoc';

    protected $fillable = [
        'ingreso','hombres_ing','mujeres_ing','retiro','hombres_ret','mujeres_ret','id_ano','id_cooperativa'
    ];

    public function Ano(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }
}

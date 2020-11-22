<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class retiroasoc extends Model
{

    protected $table = 'retiroasoc';

    protected $fillable = [
       'ingresos','hombres_in','mujeres_in','retiros','hombres_ret','mujeres_ret','id_ano','id_cooperativa'
    ];

    public function Ano(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }
}

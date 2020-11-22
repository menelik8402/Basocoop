<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class categoriaocupasoc extends Model
{
    protected $table = 'categoriaocupasoc';

    protected $fillable = [
        'empsectpub','empsectpri','comerc','product','estudiat','jubilado','profind','otroscat','id_ano','id_cooperativa'
    ];

    public function GetAno(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }


}

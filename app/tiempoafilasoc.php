<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;
use BasoCoop\Ano;
class tiempoafilasoc extends Model
{
    //
    protected $table='tiempoafilasoc';

    protected $fillable= [

       'time_0_1','time_1_2','time_3_5','time_5_10','time_10_15','time_15_20','time_20_25','time_25_30','time_30_35','time_35_40','time_40_48','timemas50','id_ano'

    ];

    public function Ano(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }


}

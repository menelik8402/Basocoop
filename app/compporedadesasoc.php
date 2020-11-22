<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;
use BasoCoop\Ano;

class compporedadesasoc extends Model
{
    //

    protected $table = 'compporedadesasoc';


    protected $fillable = [
        'edad_18_25', 'edad_26_35', 'edad_36_45', 'edad_46_55', 'edad_56_60',
        'edad_61_70', 'mas70', 'id_ano',
    ];
    public function Ano(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }

}

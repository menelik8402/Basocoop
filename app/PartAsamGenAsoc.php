<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class PartAsamGenAsoc extends Model
{
    //

    protected $table = 'PartAsamGenAsoc';

    protected $fillable = [
        'soc_conv', 'soc_asist', 'id_ano', 'id_cooperativa'
    ];

    public function Ano(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }
}

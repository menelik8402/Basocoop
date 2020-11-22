<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class solicafiliasoc extends Model
{
    //
    protected $table = 'solicafiliasoc';

    protected $fillable = [
      'realizada','aprobada','rechazada','id_ano','id_cooperativa'
    ];
    public function Ano(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }
}

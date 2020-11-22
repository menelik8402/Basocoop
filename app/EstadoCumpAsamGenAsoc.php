<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class EstadoCumpAsamGenAsoc extends Model
{
    //
    protected $table = 'EstadoCumpAsamGenAsoc';

    protected $fillable = [
        'cumplido', 'proccump', 'id_ano', 'id_cooperativa'
    ];


    public function Ano(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }
}

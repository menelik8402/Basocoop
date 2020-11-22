<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;
use BasoCoop\Ano;

class Premisas extends Model
{
    protected $table = 'premisas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'cond_educativa', 'cond_legal','id_cooperativa','id_ano'
    ];

    protected $hidden = [

    ];

    public function GetAno(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

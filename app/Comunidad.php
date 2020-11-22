<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Comunidad extends Model
{
    //
    protected $table = 'Comunidad';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cant_act_real','cant_part_act_desr_com','apoy_ints_comun', 'id_ano','id_cooperativa'
    ];

    protected $hidden = [

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function Ano(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }
}

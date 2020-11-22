<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class OpeFinCoop extends Model
{
    protected $table = 'OpeFinCoop';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cant_oper_red_act','usuario_red_act','pto_serv_red_act','cant_oper_caj_aut','usuario_caj_aut','pto_serv_caj_aut', 'id_ano','id_cooperativa'
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

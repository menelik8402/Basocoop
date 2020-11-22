<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class AutonIndep extends Model
{
    protected $table = 'autonIndep';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'capital_prop', 'capital_ext','acu_cump_cap_prop','acu_cump_cap_ext', 'acu_cump_ini_prop', 'acu_cump_inj_ext', 'id_ano','id_cooperativa'
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

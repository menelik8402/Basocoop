<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class IntegrCoop extends Model
{
    protected $table = 'IntegrCoops';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'cant_asoc_part_asamb_coop','cant_ali_est_inst','cant_ali_est_interinst', 'id_ano','id_cooperativa'
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

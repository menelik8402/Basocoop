<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;
use BasoCoop\Seguimientometa;
use BasoCoop\Programa;

class Metas extends Model
{
    protected $table = 'metas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   /* protected $fillable = [
        'responsable', 'presupuesto', 'desc_unid_fisicas','manif_num', 'unid_fisicas_plan',
        'beneficiarios_plan', 'unid_fisicas_real', 'beneficiarios_real', 'unid_fisicas_satif',
        'beneficiarios_satif', 'fecha_cumplimiento','id_programa'
    ];*/

    protected $fillable = [
        'responsable', 'presupuesto', 'desc_unid_fisicas', 'unid_fisicas_plan',
        'beneficiarios_plan','id_programa'
    ];

    protected $hidden = [

    ];

    public function Programa(){
        return $this->belongsTo('BasoCoop\Programa','id_programa');
    }

    public function GetSeguimientos(){
        return $this->hasMany(Seguimientometa::class,'id_meta');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

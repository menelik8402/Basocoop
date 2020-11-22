<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;
use BasoCoop\Metas;

class Seguimientometa extends Model
{
    //
    protected $table = 'seguimiento_meta';

    protected $fillable = [
        'descripcion','presup_con','unid_fisicas_planif','num_benef_planif','unid_fisicas_real','num_beneficiarios_real',
        'fecha_seguimiento','id_meta','presup_real','fecha_real','estado'
    ];


    public function GetMeta(){
      return $this->belongsTo('BasoCoop\Metas','id_meta');
    }


}

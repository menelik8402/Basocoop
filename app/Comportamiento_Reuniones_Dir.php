<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Comportamiento_Reuniones_Dir extends Model
{
    protected $table = 'comportamientoreunionesdir';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'consejo_administracion', 'consejo_directivo' , 'comite_educacion' , 'comite_vigilancia','comite_credito','id_ano','consejo_administracion_real', 'consejo_directivo_real' , 'comite_educacion_real' , 'comite_vigilancia_real','comite_credito_real'
    ];

    protected $hidden = [

    ];
    public function Ano(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

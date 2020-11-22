<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = 'encuesta';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre'//,'femenino', 'edad', 'id_tipo_nivel_esc'
    ];

public function Pregunta(){
        return $this->hasMany(Pregunta::class,'pregunta','id');
    }

    protected $hidden = [

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

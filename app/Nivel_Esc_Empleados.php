<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;
use BasoCoop\Ano;
class Nivel_Esc_Empleados extends Model
{
    protected $table = 'nivelescempleados';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ninguno', 'basico' , 'medio' , 'universitario','postgrado', 'id_ano'
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

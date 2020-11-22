<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class CantEmpleado extends Model
{
    protected $table = 'cant_empleados';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hombres', 'mujeres', 'id_ano'
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

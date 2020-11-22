<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Distribucion_Utilidades extends Model
{
    protected $table = 'distribucionutilidades';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'capitalizar_coop', 'distribucion_socios','fondo_sociales', 'reservas', 'id_ano','id_cooperativa','capital_per','excedente'
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

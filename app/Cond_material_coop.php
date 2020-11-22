<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Cond_material_coop extends Model
{
    protected $table = 'condmaterialcoop';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'utilidades','presupuesto_coop','fondo_educacion','mercadeo','cmte_genero','otros_ingresos','id_premisas'
    ];

    protected $hidden = [

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

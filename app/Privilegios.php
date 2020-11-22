<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Privilegios extends Model
{
    //
    protected $table = 'privilegios';

    protected $fillable = [
       'nomb_priv','codigo_priv','accion_add','accion_edit','accion_elim','accion_inf','id_user'
    ];
}

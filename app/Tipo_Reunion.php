<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Tipo_Reunion extends Model
{
    protected $table = 'tipo_reunion';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_reunion','id_var_II','id_ano'
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

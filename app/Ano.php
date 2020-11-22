<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Ano extends Model
{
    protected $table = 'ano';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ano' // solo tiene un id y el año, no sé si tendra algo más
    ];

    protected $hidden = [

    ];

//    public function cantAsoc(){
//        return $this->hasMany(Cant_Asociados::class,'id_ano','id');
//    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

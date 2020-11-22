<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;
use BasoCoop\Ano;

class Programa extends Model
{
    protected $table = 'programa';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomb_prog', 'objetivo', 'metodologia', 'presupuesto_prog','id_ano', 'id_cooperativa'
    ];

    protected $hidden = [

    ];

    public function Metas(){
        return $this->hasMany(Metas::class,'id_programa','id');
    }

    public function Ano(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }
    public function Cooperativa(){
        return $this->belongsTo('BasoCoop\Cooperativa','id_cooperativa');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

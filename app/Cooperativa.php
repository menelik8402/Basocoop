<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Cooperativa extends Model
{
    protected $table = 'cooperativa';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','fed_id'
    ];

    protected $hidden = [

    ];

    public function Programas(){
        return $this->hasMany(Programa::class,'id_cooperativa','id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

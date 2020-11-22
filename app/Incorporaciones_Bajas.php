<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;
use BasoCoop\Ano;
class Incorporaciones_Bajas extends Model
{
    protected $table = 'incorporacionesbajas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'incorporaciones', 'bajas','voluntarias', 'expulsados', 'id_ano'
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

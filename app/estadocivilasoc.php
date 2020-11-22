<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;
use BasoCoop\Ano;

class estadocivilasoc extends Model
{
    //
    protected $table = 'estadocivilasoc';
    protected $fillable = [
        'soltero','casado','unionlibre','id_ano'
    ];
    public function Ano(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }

}

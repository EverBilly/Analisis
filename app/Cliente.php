<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at'];

    protected $table = 'clientes';

    //     public function municipios(){
    //     return $this->hasOne('App\Municipio','id','municipio');
    // }
}

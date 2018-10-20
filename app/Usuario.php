<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable
{

    use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    // protected $fillable = [
    // 	'nombre',
    // 	'apellido',
    // 	'telefono',
    // 	'password',
    //     'rol'
    // ];

    public function setPassword($valor)
    {
    	if (!empty($valor)) {
    		$this->attributes['password'] = \Hash::make($valor);
    	}
    }

    public function roles(){
        return $this->hasOne('App\Rol','id','rol');
    }
}

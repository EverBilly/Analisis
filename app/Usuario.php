<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
	use softDeletes;

	protected $dates = ['deleted_at'];

    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'nombre',
    	'apellido',
    	'telefono',
    	'password',
        'rol'
    ];

    public function setPassword($valor)
    {
    	if (!empty($valor)) {
    		$this->attributes['password'] = \Hash::make($valor);
    	}
    }
}

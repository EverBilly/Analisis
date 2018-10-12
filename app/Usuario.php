<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
	use softDeletes;

	protected $dates = ['deleted_at'];

    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'nombre',
    	'apellido',
    	'telefono',
    	'password'
    ];

    public function setPassword($valor)
    {
    	if (!empty($valor)) {
    		$this->attributes['password'] = \Hash::make($valor);
    	}
    }
}

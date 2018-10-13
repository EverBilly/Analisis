<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use softDeletes;

    protected $date = ['deleted_at'];

    protected $table = 'roles';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'nombre',
    	'estado'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detalle_Producto extends Model
{
	use softDeletes;
    protected $date = ['deleted_at'];

    protected $table = 'detalle_productos';
    protected $primaryKey = 'id';
}

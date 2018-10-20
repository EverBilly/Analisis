<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{
    use softDeletes;

    protected $date = ['deleted_at'];

    protected $table = 'marcas';
    protected $primaryKey = 'id';
}

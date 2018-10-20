<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salida extends Model
{
    use softDeletes;

    protected $date = ['deleted_at'];

    protected $table = 'salidas';
    protected $primaryKey = 'id';
}

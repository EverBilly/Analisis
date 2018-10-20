<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entrada extends Model
{
    use softDeletes;

    protected $date = ['deleted_at'];

    protected $table = 'entradas';
    protected $primaryKey = 'id';
}

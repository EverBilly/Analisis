<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use softDeletes;

    protected $date = ['deleted_at'];

    protected $table = 'categorias';
    protected $primaryKey = 'id';
}

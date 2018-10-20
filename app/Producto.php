<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use softDeletes;

    protected $date = ['deleted_at'];

    protected $table = 'productos';
    protected $primaryKey = 'id';
}

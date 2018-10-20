<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medida extends Model
{
    use softDeletes;

    protected $date = ['deleted_at'];

    protected $table = 'medidas';
    protected $primaryKey = 'id';
}

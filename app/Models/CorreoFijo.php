<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorreoFijo extends Model
{
    public $table = "somnolencia_correos_fijos";
    protected $primaryKey = 'id';
    public $timestamps = false;
    //protected $connection = 'compras';
}

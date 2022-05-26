<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnvioCorreo extends Model
{
    public $table = "somnolencia_envio_correo";
    protected $primaryKey = 'ID';
    public $timestamps = false;
    //protected $connection = 'compras';
}

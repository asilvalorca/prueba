<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    public $table = "somnolencia_trabajador";
    protected $primaryKey = 'FICHA';
    public $timestamps = false;
    //protected $connection = 'compras';

    public function anegocio()
    {
        return $this->hasMany('App\Models\Anegocio', 'NUM_ANEGOCIO', 'NUM_ANEGOCIO');
    }


}

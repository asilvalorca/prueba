<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioRolPrivado extends Model
{
    public $table = "covid_trabajador_rprivado";
    protected $primaryKey = 'FICHA';
    public $timestamps = false;
    //protected $connection = 'compras';

    public function anegocio()
    {
        return $this->hasMany('App\Models\Anegocio', 'NUM_ANEGOCIO', 'NUM_ANEGOCIO');
    }

}

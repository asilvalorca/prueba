<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    public $table = "somnolencia_registro";
    protected $primaryKey = 'id_registro';
    public $timestamps = false;

}

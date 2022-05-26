<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    public $table = "covid_vacuna";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['rut'];
}

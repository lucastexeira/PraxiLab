<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial_Practica extends Model
{
    protected $table = 'historial_practicas';

    protected $fillable = [ 'id_estado', 'id_voluntario', 'id_practica'];
}

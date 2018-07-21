<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial_Practica extends Model
{
    protected $table = "evidencias";

    protected $fillable = [ 'id_estado', 'id_voluntario', 'id_practica'];
}

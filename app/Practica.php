<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    protected $table = 'practicas';

    protected $fillable = ['nombre_practica','descripcion','imagen','id_practicante','id_voluntario'];
}

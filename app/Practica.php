<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    protected $table = 'practicas';

    protected $fillable = ['descripcion','img','id_practicante','id_voluntario'];
}

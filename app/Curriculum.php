<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = "curriculums";

    protected $fillable = [ 'formacion_academica', 'formacion_complementaria', 'eperiencia', 'descripcion', 'idiomas', 'referecias', 'otros_datos', 'id_persona'];
    
	//return $this->hasOne('App\Curriculum','id_persona','id_persona');
	
}

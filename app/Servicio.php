<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = ['nombre_servicio','id_rubro'];
	
	return this->belongTo('App\Servicio','id_rubro','id_rubro');
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = ['id_rubro', 'nombre_servicio', 'imagen', 'id_rubro'];


}

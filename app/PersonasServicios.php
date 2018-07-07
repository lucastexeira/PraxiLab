<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonasServicios extends Model
{
    protected $table = "personas_servicios";

    protected $fillable = [ 'id_persona', 'id_servicio'];
}

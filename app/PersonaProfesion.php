<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonaProfesion extends Model
{
    protected $table = "personas_profesiones";

    protected $fillable = [ 'id_persona', 'id_profesion'];
}

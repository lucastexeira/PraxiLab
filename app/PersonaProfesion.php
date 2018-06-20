<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonaProfesion extends Model
{
    protected $table = "id_personasprofesiones";

    protected $fillable = [ 'id_persona', 'id_profesion'];
}

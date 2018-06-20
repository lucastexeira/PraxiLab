<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $fillable = [
        'nombre', 'mail', 'apellido', 'telefono', 'mail', 'contrasena','provincia', 'zona', 'pais', 'practicas_cantidad', 'creditos_cantidad',
    ];

    //sirve para ignorar los campos update `updated_at` y `created_at`
    public $timestamps = false;
}



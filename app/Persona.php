<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Persona extends \Eloquent implements Authenticatable
{
use AuthenticableTrait;
 

    protected $table = 'personas';
    protected $fillable = [
        'username', 'nombre', 'mail', 'apellido', 'telefono', 'mail', 'contrasena','provincia', 'zona', 'pais', 'practicas_cantidad', 'creditos_cantidad',
    ];

    //sirve para ignorar los campos update `updated_at` y `created_at`
    public $timestamps = false;
}   
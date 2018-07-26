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
        'username', 'nombre', 'apellido', 'telefono', 'mail','provincia', 'zona', 
        'pais', 'descripcion', 'cantidad_creditos', 'estado', 'cantpracticas_hechas', 
        'img', 'password', 'practicas_cantidad'
    ];

    //sirve para ignorar los campos update `updated_at` y `created_at`
    public $timestamps = false;
}   
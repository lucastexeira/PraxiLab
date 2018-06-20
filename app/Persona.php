<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Persona as Authenticatable;

class Persona extends Authenticatable
{
    use Notifiable; // que es esto?

    protected $table = "personas";

    protected $fillable = [
        'nombre', 'mail', 'apellido', 'telefono', 'mail', 'provincia', 'zona', 'pais', 'practicas_cantidad', 
        'creditos_cantidad' ];//falta CONTRASEÑA

    //CONTRASEÑA
    /*protected $hidden = [
        'password', 'remember_token',
    ];*/
}

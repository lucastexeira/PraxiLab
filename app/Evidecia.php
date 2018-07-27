<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidecia extends Model
{
    protected $table = "evidencias";

    protected $fillable = [ 'pathevidencia', 'fecha', 'titulo', 'evidencia_descripcion', 'id_historial_practica', 'calificacion', 'comentario', 'id_autor', 'id_destinatario'];
}

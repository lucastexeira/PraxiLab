<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalificacionComentario extends Model
{
    protected $table = "calificacionescomentarios";

    protected $fillable = [ 'calificacion', 'comentario', 'id_autor', 'id_destinatario'];
}

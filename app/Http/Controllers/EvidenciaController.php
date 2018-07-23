<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Rubro;
use App\Servicio;
use App\Persona;
use App\Practica;
use App\Evidecia;
use App\CalificacionComentario;
use App\Historial_Practica;
use App\PersonasServicios;
use Illuminate\Http\Request;
use App\Http\Requests;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Session; 
use DateTime;
use Illuminate\Support\Facades\Redirect;

class EvidenciaController extends Controller
{
    public function irAcargarEvidencia(Request $request, $id_historial_practicas){

        $evidencia = new Evidecia();
        $calificacionescomentarios = new CalificacionComentario();
        
        $rubros = Rubro::all();

        $practicaEvidencia = Historial_Practica::where('historial_practicas.id', $id_historial_practicas)
            ->leftJoin('practicas', 'historial_practicas.id_practica', '=', 'practicas.id')
            ->select(
                'historial_practicas.id',
                'practicas.nombre_practica',
                'practicas.imagen_practica',
                'practicas.id'
        )
        ->first();

        return view('/cargarEvidencia')->with('rubros',$rubros)->with('evidencia',$evidencia)->with('practicaEvidencia',$practicaEvidencia)->with('calificacionescomentarios',$calificacionescomentarios);

    }

    public function createEvidencia(Request $req, $id){

        //$session_id = session()->getId();
        $req = Session::get('mail');

        $now = new \DateTime();
        $now->format('d-m-Y H:i:s');

        if ( $req ){
            $evidencia = new Evidecia();
            $evidencia->pathevidencia = Input::get('pathevidencia');
            $evidencia->fecha = $now;
            $evidencia->id_practica = $id;
            $evidencia->save();

            $idPersona = DB::table('personas')->where('mail', $req)->first()->id;

            $calificacionescomentarios = new CalificacionComentario();
            $calificacionescomentarios->calificacion = Input::get('calificacion');
            $calificacionescomentarios->comentario = Input::get('comentario');
            $calificacionescomentarios->id_persona = $idPersona;
            $calificacionescomentarios->save();
           
        }

         $rubros = Rubro::all();

         return Redirect::to('/listadoPracticasEstados');
    }
}

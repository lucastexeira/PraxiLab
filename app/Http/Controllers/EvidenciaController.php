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
use Illuminate\Support\Facades\Url;
use Session; 
use DateTime;
use Illuminate\Support\Facades\Redirect;

class EvidenciaController extends Controller
{
    public function irAcargarEvidencia(Request $request, $id_historial_practicas){

        $evidencia = new Evidecia();
        
        $rubros = Rubro::all();

        $practicaEvidencia = Historial_Practica::where('historial_practicas.id', $id_historial_practicas)
            ->leftJoin('practicas', 'historial_practicas.id_practica', '=', 'practicas.id')
            ->select(
                'historial_practicas.id as id_historial_practica',
                'practicas.nombre_practica',
                'practicas.imagen_practica',
                'practicas.id'
        )
        ->first();

        return view('/cargarEvidencia')->with('rubros',$rubros)->with('evidencia',$evidencia)->with('practicaEvidencia',$practicaEvidencia);
        //dd($practicaEvidencia);
    }

    public function createEvidencia(Request $req, $id){

        //$session_id = session()->getId();
        $rubros = Rubro::all();
        $req = Session::get('mail');

        $now = new \DateTime();
        $now->format('d-m-Y H:i:s');

        $id_historial_practica = DB::table('evidencias')
                    ->where('id_historial_practica',$id)
                    ->first();
        
        $id_destinatario =  DB::table('historial_practicas')
                                ->where('id',$id)
                                ->first();
        
        $id_des = $id_destinatario->id_voluntario;                        

        if($id_historial_practica != null){
            $id_hp = $id_historial_practica->id;
        }
        else{
            $id_hp = 0;
        }

        if ( $req ){
            
            $idPersona = DB::table('personas')->where('mail', $req)->first()->id;

            $evidencia = new Evidecia();
            $evidencia->pathevidencia = Input::get('pathevidencia');
            $evidencia->fecha = $now;
            $evidencia->id_historial_practica = $id;
            $evidencia->calificacion = Input::get('calificacion');
            $evidencia->comentario = Input::get('comentario');
            $evidencia->id_autor = $idPersona;
            $evidencia->id_destinatario = $id_des;
            $evidencia->save();

            if($id_hp == $id){
                DB::table('historial_practicas')
                    ->where('id', $id)
                    ->update(['id_estado' => 4]);
            }

            //$calificacionescomentarios = new CalificacionComentario();
            //$calificacionescomentarios->save();
           
        }

        // dd($id_des);
        return Redirect::to('/listadoPracticasEstados');
    }

    public function irAcargarEvidenciaVoluntario(Request $request, $id_historial_practicas){

        $evidencia = new Evidecia();
        
        $rubros = Rubro::all();

        $practicaEvidencia = Historial_Practica::where('historial_practicas.id', $id_historial_practicas)
            ->leftJoin('practicas', 'historial_practicas.id_practica', '=', 'practicas.id')
            ->select(
                'historial_practicas.id as id_historial_practica',
                'practicas.nombre_practica',
                'practicas.imagen_practica',
                'practicas.id'
        )
        ->first();

        return view('/cargarEvidenciaVoluntario')->with('rubros',$rubros)->with('evidencia',$evidencia)->with('practicaEvidencia',$practicaEvidencia);
        //dd($practicaEvidencia);
    }

    public function createEvidenciaVoluntario(Request $req, $id){

        //$session_id = session()->getId();
        $rubros = Rubro::all();
        $req = Session::get('mail');

        $now = new \DateTime();
        $now->format('d-m-Y H:i:s');

        $id_historial_practica = DB::table('evidencias')
                    ->where('id_historial_practica',$id)
                    ->first();

        if($id_historial_practica != null){
            $id_hp = $id_historial_practica->id;
        }
        else{
            $id_hp = 0;
        }

        $id_destinatario =  DB::table('historial_practicas')
                                ->join('practicas', 'historial_practicas.id_practica', '=', 'practicas.id')
                                ->where('historial_practicas.id',$id)
                                ->first();
        
        $id_des = $id_destinatario->id_practicante;    

        if ( $req ){
            
            $idPersona = DB::table('personas')->where('mail', $req)->first()->id;

            $evidencia = new Evidecia();
            $evidencia->pathevidencia = null;
            $evidencia->fecha = $now;
            $evidencia->id_historial_practica = $id;
            $evidencia->calificacion = Input::get('calificacion');
            $evidencia->comentario = Input::get('comentario');
            $evidencia->id_autor = $idPersona;
            $evidencia->id_destinatario = $id_des;
            $evidencia->save();

            if($id_hp == $id){
                DB::table('historial_practicas')
                    ->where('id', $id)
                    ->update(['id_estado' => 4]);
            }
           
        }

        //dd($id_des);
        return Redirect::to('/listadoPracticasEstados');
    }
    
    public function verEvidencia(Request $req){

        //$session_id = session()->getId();
        $req = Session::get('mail');

         $rubros = Rubro::all();
         //dd($calificacionescomentarios);
         return view('/verEvidencia')->with('rubros',$rubros);
    }
}

<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Rubro;
use App\Servicio;
use App\Persona;
use App\Practica;
use App\Evidecia;
use App\Transaccion;
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
        
        // se obtiene el id del historial de la practica para saber si ya existe en la base de datos algun comentario de ese historial y asi poder finalizarla
        $id_historial_practica = DB::table('evidencias')
                    ->where('id_historial_practica',$id)
                    ->first();

        if($id_historial_practica != null){
            $id_hp = $id_historial_practica->id_historial_practica;
        }
        else{
            $id_hp = 0;
        }

        // se obtiene el id del usuario que esta recibiendo el comentario
        $id_destinatario =  DB::table('historial_practicas')
                                ->where('id',$id)
                                ->first();
        
        $id_des = $id_destinatario->id_voluntario;                        

        // se obtiene la cantidad de creditos que tiene el usuario para hacer una transferencia.
        $id_historial_practica = DB::table('practicas')
                    ->join('historial_practicas', 'historial_practicas.id_practica', '=', 'practicas.id')
                    ->join('personas', 'personas.id', '=', 'practicas.id_practicante')
                    ->where('historial_practicas.id',$id)
                    ->first();

        $id_historial_voluntario = DB::table('historial_practicas')
                    ->join('personas', 'personas.id', '=', 'historial_practicas.id_voluntario')
                    ->where('historial_practicas.id',$id)
                    ->first();

        $id_practicante = $id_historial_practica->id_practicante;
        $id_voluntario = $id_historial_voluntario->id_voluntario;

        $creditosPracticante = $id_historial_practica->cantidad_creditos;
        $creditosVoluntario = $id_historial_voluntario->cantidad_creditos;

        $precio = $id_historial_practica->precio;

        $montoAGuardarPracticante = $creditosPracticante-$precio;
        $montoAGuardarVoluntario = $creditosVoluntario+$precio;

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

                DB::table('personas')
                    ->where('id', $id_practicante)
                    ->update(['cantidad_creditos' => $montoAGuardarPracticante]); 
                
                DB::table('personas')
                    ->where('id', $id_voluntario)
                    ->update(['cantidad_creditos' => $montoAGuardarVoluntario]);
                
                $transaccionDebitada = new Transaccion();
                $transaccionDebitada->monto_transferido = $precio;
                $transaccionDebitada->id_emisor = $id_practicante;
                $transaccionDebitada->id_destinatario = $id_voluntario;
                $transaccionDebitada->historial_practica = $id;
                $transaccionDebitada->id_transaccione_mercadopago = null;
                $transaccionDebitada->estado = 0;
                $transaccionDebitada->save();

            }

        }

        //dd($id_historial_practica);
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
        
        // se obtiene el id del historial de la practica para saber si ya existe en la base de datos algun comentario de ese historial y asi poder finalizarla
        $id_historial_practica = DB::table('evidencias')
                    ->where('id_historial_practica',$id)
                    ->first();

        if($id_historial_practica != null){
            $id_hp = $id_historial_practica->id_historial_practica;
        }
        else{
            $id_hp = 0;
        }

        // se obtiene el id del usuario que esta recibiendo el comentario
        $id_destinatario =  DB::table('historial_practicas')
                                ->join('practicas', 'historial_practicas.id_practica', '=', 'practicas.id')
                                ->where('historial_practicas.id',$id)
                                ->first();
        $id_des = $id_destinatario->id_practicante;  
        
        // se obtiene la cantidad de creditos que tiene el usuario para hacer una transferencia.
        $id_historial_practica = DB::table('practicas')
                    ->join('historial_practicas', 'historial_practicas.id_practica', '=', 'practicas.id')
                    ->join('personas', 'personas.id', '=', 'practicas.id_practicante')
                    ->where('historial_practicas.id',$id)
                    ->first();

        $id_historial_voluntario = DB::table('historial_practicas')
                    ->join('personas', 'personas.id', '=', 'historial_practicas.id_voluntario')
                    ->where('historial_practicas.id',$id)
                    ->first();

        $id_practicante = $id_historial_practica->id_practicante;
        $id_voluntario = $id_historial_voluntario->id_voluntario;

        $creditosPracticante = $id_historial_practica->cantidad_creditos;
        $creditosVoluntario = $id_historial_voluntario->cantidad_creditos;

        $precio = $id_historial_practica->precio;

        $montoAGuardarPracticante = $creditosPracticante-$precio;
        $montoAGuardarVoluntario = $creditosVoluntario+$precio;


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

                DB::table('personas')
                    ->where('id', $id_practicante)
                    ->update(['cantidad_creditos' => $montoAGuardarPracticante]); 
                
                DB::table('personas')
                    ->where('id', $id_voluntario)
                    ->update(['cantidad_creditos' => $montoAGuardarVoluntario]);

                $transaccionDebitada = new Transaccion();
                $transaccionDebitada->monto_transferido = $precio;
                $transaccionDebitada->id_emisor = $id_practicante;
                $transaccionDebitada->id_destinatario = $id_voluntario;
                $transaccionDebitada->historial_practica = $id;
                $transaccionDebitada->id_transaccione_mercadopago = null;
                $transaccionDebitada->estado = 0;
                $transaccionDebitada->save();
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

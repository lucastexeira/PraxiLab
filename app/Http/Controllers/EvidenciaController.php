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

        $req = Session::get('mail');
        $id = Persona::where('mail', $req)->first()->id;
        $persona = Persona::find($id);

        $practicaEvidencia = Historial_Practica::where('historial_practicas.id', $id_historial_practicas)
        ->leftJoin('practicas', 'historial_practicas.id_practica', '=', 'practicas.id')
        ->select(
            'historial_practicas.id as id_historial_practica',
            'practicas.nombre_practica',
            'practicas.imagen_practica',
            'practicas.id'
        )
        ->first();

        return view('/cargarEvidencia')->with('rubros',$rubros)->with('evidencia',$evidencia)->with('practicaEvidencia',$practicaEvidencia)->with('persona',$persona);
        //dd($practicaEvidencia);
    }

    public function createEvidencia(Request $request, $id){

        //dd($req->hasFile('imgEvidencia'));
        //$session_id = session()->getId();
        $this->validate($request, [
            'imgEvidencia' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $req = Session::get('mail');

        $now = new \DateTime();
        $now->format('d-m-Y H:i:s');
        
        // se obtiene el id del historial de la practica para saber si ya existe en la base de datos algun comentario de ese historial y asi poder finalizarla
        $id_historial_practica = DB::table('evidencias')
        ->where('id_historial_practica',$id)
        ->first();

        $id_historial_practica_imagen = $id;
        
        $id_comentario_voluntario = null;

        if($id_historial_practica != null){

            $id_hp = $id_historial_practica->id_historial_practica;

            $id_comentario_voluntario = $id_historial_practica->id;

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

            
            $evidencia->fecha = $now;
            $evidencia->id_historial_practica = $id;
            $evidencia->calificacion = Input::get('calificacion');
            $evidencia->comentario = Input::get('comentario');
            $evidencia->id_autor = $idPersona;
            $evidencia->id_destinatario = $id_des;
            if($request->hasFile('imgEvidencia')){ 
                $image = $request->file('imgEvidencia'); 
                $fileName = $image->getClientOriginalName();
                $fileExtension = $image->getClientOriginalExtension();
                $imageName = 'id_practica'.$id_historial_practica_imagen.'.'.$image->getClientOriginalExtension();
                $image->move(base_path().'/public/img/evidencia/', $imageName);
                $evidencia->pathevidencia = 'img/evidencia/'.$imageName; 
            }
            $evidencia->save();
            
            
            if($id_comentario_voluntario != null){
                    // Debido a que el comentario del usuario voluntario carga imagen de evidencia en la base de datos, se le agrega de esta forma, para mostrarlo en el perfil del voluntario, si es una negrada pero toda la aplicacion esta cochina, putoelquelee 
                    DB::table('evidencias')
                        ->where('id', $id_comentario_voluntario)
                        ->update(['pathevidencia' =>'img/evidencia/'.$imageName]);
                }

            if($id_hp == $id){
                // esto es para cuando ya tiene otro comentario el historial, se cierre y se acredite el monto de la practica
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
            else{
                DB::table('historial_practicas')
                ->where('id', $id)
                ->update(['id_estado' => 5]);
            }

        }

        $rubros = Rubro::all();
         //dd($calificacionescomentarios);
        return Redirect::to('/listadoPracticasEstados');
    }

    public function irAcargarEvidenciaVoluntario(Request $request, $id_historial_practicas){

        $evidencia = new Evidecia();
        
        $rubros = Rubro::all();
        $req = Session::get('mail');
        $id = Persona::where('mail', $req)->first()->id;
        $persona = Persona::find($id);

        $practicaEvidencia = Historial_Practica::where('historial_practicas.id', $id_historial_practicas)
        ->leftJoin('practicas', 'historial_practicas.id_practica', '=', 'practicas.id')
        ->select(
            'historial_practicas.id as id_historial_practica',
            'practicas.nombre_practica',
            'practicas.imagen_practica',
            'practicas.id'
        )
        ->first();

        return view('/cargarEvidenciaVoluntario')->with('rubros',$rubros)->with('evidencia',$evidencia)->with('practicaEvidencia',$practicaEvidencia)->with('persona',$persona);
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

        $imagenEvidencia = null;

        if($id_historial_practica != null){
            $id_hp = $id_historial_practica->id_historial_practica;

            $id_comentario_practicante = $id_historial_practica->id;

            // Debido a que el comentario del usuario voluntario carga imagen de evidencia en la base de datos, se le agrega de esta forma, para mostrarlo en el perfil del voluntario, si es una negrada pero toda la aplicacion esta cochina, putoelquelee 
            $imagen = $id_historial_practica = DB::table('evidencias')
            ->where('id',$id_comentario_practicante)
            ->first();

            $imagenEvidencia= $imagen->pathevidencia;
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
            $evidencia->pathevidencia = $imagenEvidencia;
            $evidencia->fecha = $now;
            $evidencia->id_historial_practica = $id;
            $evidencia->calificacion = Input::get('calificacion');
            $evidencia->comentario = Input::get('comentario');
            $evidencia->id_autor = $idPersona;
            $evidencia->id_destinatario = $id_des;
            $evidencia->save();

            if($id_hp == $id){
                // esto es para cuando ya tiene otro comentario el historial, se finaliza el historial de practicas y se acredite el monto de la practica
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
            else{
                DB::table('historial_practicas')
                ->where('id', $id)
                ->update(['id_estado' => 5]);
            }

        }

        //dd($imagenEvidencia);
        return Redirect::to('/listadoPracticasEstados');
    }
    
    public function verEvidencia(Request $req, $id_historial_practica){

        $req = Session::get('mail');
        $id = Persona::where('mail', $req)->first()->id;
        $persona = Persona::find($id);
        $rubros = Rubro::all();

        $usuarioPracticante = DB::table('historial_practicas')
        ->join('practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
        ->where('historial_practicas.id', $id_historial_practica)
        ->first();

        $id_usuario_Practicante = $usuarioPracticante->id_practicante;

        $evidenciaPractica = DB::table('historial_practicas')
        ->join('practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
        ->join('evidencias', 'evidencias.id_historial_practica', '=', 'historial_practicas.id')
        ->where('historial_practicas.id',$id_historial_practica)
        ->get();

        $comentarioPracticante = DB::table('historial_practicas')
        ->join('practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
        ->join('evidencias', 'evidencias.id_historial_practica', '=', 'historial_practicas.id')
        ->join('personas', 'personas.id', '=', 'practicas.id_practicante')
        ->where('historial_practicas.id',$id_historial_practica)
        ->where('evidencias.id_autor',$id_usuario_Practicante)
        ->first();

        $comentarioVoluntario = DB::table('historial_practicas')
        ->join('practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
        ->join('evidencias', 'evidencias.id_historial_practica', '=', 'historial_practicas.id')
        ->join('personas', 'personas.id', '=', 'historial_practicas.id_voluntario')
        ->where('historial_practicas.id',$id_historial_practica)
        ->where('evidencias.id_autor', '!=',$id_usuario_Practicante)
        ->first();

        $imagen = DB::table('evidencias')
        ->where('id_historial_practica',$id_historial_practica)
        ->where('pathevidencia','!=',null)
        ->first();

        $nombre = DB::table('historial_practicas')
        ->join('practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
        ->where('historial_practicas.id',$id_historial_practica)
        ->first();

        $voluntarioCalificado = $comentarioPracticante->calificacion;
        $practicanteCalificado = $comentarioVoluntario->calificacion;

        $nombrePractica = $nombre->nombre_practica;
        
        $imagenEvidencia = $imagen->pathevidencia;

        //dd($comentarioPracticante);
        return view('/verEvidencia')->with('rubros',$rubros)->with('persona',$persona)->with('nombrePractica',$nombrePractica)->with('imagenEvidencia',$imagenEvidencia)
        ->with('comentarioPracticante',$comentarioPracticante)->with('comentarioVoluntario',$comentarioVoluntario)
        ->with('voluntarioCalificado',$voluntarioCalificado)
        ->with('practicanteCalificado',$practicanteCalificado);
    }

}

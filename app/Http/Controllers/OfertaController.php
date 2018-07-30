<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Rubro;
use App\Servicio;
use App\Practica;
use App\Historial_Practica;
use App\PersonasServicios;
use App\Evidecia;
use App\Http\Requests;
use Exception;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Image;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Session; 
use DateTime;

class OfertaController extends Controller
{
    public function oferta(Request $req, $id_oferta){ 

        $req = Session::get('mail');
        $persona = Persona::where('mail', $req)->first();

        $historial_practicas = new Historial_Practica();
        $rubros = Rubro::all();
        /*$practicaPersona = DB::Select('select practicas.id as practica_id, nombre_practica, img, imagen_practica, username, precio, practicas.descripcion from practicas 
                                       inner join personas on practicas.id_practicante = personas.id 
                                       where practicas.id = '.$id_oferta.'');*/

        $practicaPersona = DB::table('practicas')
                                ->join('personas', 'personas.id', '=', 'practicas.id_practicante')
                                ->select('practicas.id as practica_id', 'nombre_practica', 'img', 'imagen_practica', 'username', 'precio', 'practicas.descripcion', 'id_practicante')
                                ->where('practicas.id',$id_oferta)
                                ->first();
        
        $id_practicante = $practicaPersona->id_practicante;

        $promedioCalificacion = DB::table('evidencias')
                                        ->join('historial_practicas', 'historial_practicas.id', '=', 'evidencias.id_historial_practica')
                                        ->join('practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
                                        ->where('practicas.id', $id_oferta)
                                        ->where('evidencias.id_autor' , '!=', $id_practicante)
                                        ->where('historial_practicas.id_estado', '=', 4)
                                        ->avg('calificacion');

        $promedioRedondeado = round($promedioCalificacion);

        $comentarios = DB::table('evidencias')
                        ->join('historial_practicas', 'historial_practicas.id', '=', 'evidencias.id_historial_practica')
                        ->join('practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
						->join('personas','personas.id','=','evidencias.id_autor')
                        ->where('practicas.id', $id_oferta)
                        ->where('evidencias.id_autor' , '!=', $id_practicante)
						->where('historial_practicas.id_estado', '=', 4)
                        ->get();

        
        //dd($comentarios);
        /*$practicaPersona= Practica::where('id', $id)->first();
        $practicaPersona->Persona = Persona::where('id', $practicaPersona->id_practicante)->first();*/

        return view('oferta')->with('rubros', $rubros)->with('persona', $persona)->with('practicaPersona', $practicaPersona)->with('historial_practicas', $historial_practicas)
                             ->with('promedioRedondeado', $promedioRedondeado)->with('comentarios', $comentarios); 
        //dd($comentarios);
    }
    
    public function adquirirPractica(Request $req){

        //$session_id = session()->getId();
        
        $rubros = Rubro::all();
        $req = Session::get('mail');
        $user = Persona::where('mail', $req)->first()->id;

        if ( $req ){
            $idVoluntario = DB::table('personas')->where('mail', $req)->first()->id;
        
            $historial_practicas = new Historial_Practica();
            $historial_practicas->id_estado = '1';
            $historial_practicas->id_voluntario = $idVoluntario;
            $historial_practicas->id_practica = Input::get('id_practica');
            $historial_practicas->save();

            $practicasDelPracticante = DB::table('practicas')
            ->join('historial_practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
            ->join('personas', 'personas.id', '=', 'historial_practicas.id_voluntario')
            ->join('estados', 'estados.id', '=', 'historial_practicas.id_estado')
            ->select('practicas.id','personas.nombre', 'personas.apellido', 'personas.mail', 'personas.telefono',
                     'practicas.nombre_practica', 'practicas.precio', 'historial_practicas.id_practica', 
                     'historial_practicas.created_at', 'historial_practicas.id_estado', 'historial_practicas.id as id_historial_practicas', 'estados.estado')
            ->where('practicas.id_practicante', '=', $user)
            ->orderByRaw('created_at DESC')
            ->get();


            $practicasDelVoluntario = DB::table('practicas')
                ->join('historial_practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
                ->join('personas', 'personas.id', '=', 'historial_practicas.id_voluntario')
                ->join('estados', 'estados.id', '=', 'historial_practicas.id_estado')
                ->select('practicas.id','personas.nombre', 'personas.apellido', 'personas.mail', 'personas.telefono', 
                        'practicas.nombre_practica', 'practicas.precio', 'historial_practicas.id_practica', 
                        'historial_practicas.id as id_historial_practicas', 'historial_practicas.created_at', 'estados.estado')
                ->where('historial_practicas.id_voluntario', $user)
                ->orderByRaw('created_at DESC')
                ->get();
            
            return Redirect::to('/listadoPracticasEstados')->with('rubros',$rubros)->with('practicasDelVoluntario',$practicasDelVoluntario)->with('practicasDelPracticante',$practicasDelPracticante);
            //dd($practicasDelPracticante);
        }
    }

    
}

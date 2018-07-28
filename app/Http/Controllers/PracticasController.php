<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Rubro;
use App\Servicio;
use App\Practica;
use App\Estado;
use App\Historial_Practica;
use Illuminate\Support\Facades\DB;
use Session; 
use Illuminate\Support\Facades\Redirect;

class PracticasController extends Controller
{
    public function listadoPracticasEstados(Request $req){

        $rubros = Rubro::all();
        $req = Session::get('mail');
        $id = Persona::where('mail', $req)->first()->id;
        $persona = Persona::find($id);

        $practicasDelPracticante = DB::table('historial_practicas')
                                        ->join('practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
                                        ->join('personas', 'personas.id', '=', 'historial_practicas.id_voluntario')
                                        ->join('estados', 'estados.id', '=', 'historial_practicas.id_estado')
                                        ->select('historial_practicas.id as id_historial_practicas', 'personas.nombre', 'personas.apellido', 'personas.mail',
                                                 'personas.telefono', 'personas.id as id_voluntario',
                                                 'practicas.id', 'practicas.nombre_practica', 'practicas.precio',
                                                 'historial_practicas.created_at', 'historial_practicas.id_estado', 
                                                 'estados.estado', 'estados.id as id_estado', 'precio')
                                        ->where('practicas.id_practicante', '=', $id)
                                        ->orderByRaw('created_at DESC')
                                        ->get();

        $practicasDelVoluntario = DB::table('historial_practicas')
                                        ->join('practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
                                        ->join('personas', 'personas.id', '=', 'practicas.id_practicante')
                                        ->join('estados', 'estados.id', '=', 'historial_practicas.id_estado')
                                        ->select('historial_practicas.id as id_historial_practicas', 'personas.nombre', 'personas.apellido', 'personas.mail', 
                                                 'personas.telefono', 'personas.id as id_practicante',
                                                 'practicas.id', 'practicas.nombre_practica', 'practicas.precio',
                                                 'historial_practicas.created_at', 'historial_practicas.id_estado', 
                                                 'estados.estado', 'estados.id as id_estado', 'precio')
                                        ->where('historial_practicas.id_voluntario', '=', $id)
                                        ->orderByRaw('created_at DESC')
                                        ->get();
        
        return view('/listadoPracticasEstados')->with('rubros',$rubros)->with('practicasDelVoluntario',$practicasDelVoluntario)->with('practicasDelPracticante',$practicasDelPracticante)->with('persona',$persona);

        //dd($practicasDelVoluntario);
    }

    public function updateEstadoComenzar($id_historial_practicas){

        DB::table('historial_practicas')
                ->where('id', $id_historial_practicas)
                ->where('id_estado', 1)
                ->update(['id_estado' => 2]);

            return Redirect::to('/listadoPracticasEstados');
        }


        public function updateEstadoTerminar($id_historial_practicas){
        
        
            DB::table('historial_practicas')
                ->where('id', $id_historial_practicas)
                ->where('id_estado', 2)
                ->update(['id_estado' => 3]);

            return Redirect::to('/listadoPracticasEstados');
        }

}

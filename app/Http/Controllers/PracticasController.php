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
        $user = Persona::where('mail', $req)->first()->id;

        $practicasDelPracticante = DB::table('practicas')
            ->join('historial_practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
            ->join('personas', 'personas.id', '=', 'historial_practicas.id_voluntario')
            ->join('estados', 'estados.id', '=', 'historial_practicas.id_estado')
            ->select('personas.nombre', 'personas.apellido', 'personas.mail', 'personas.telefono', 'practicas.nombre_practica', 'practicas.precio', 'historial_practicas.id_practica', 'historial_practicas.created_at', 'historial_practicas.id_estado', 'historial_practicas.id as id_historial_practicas', 'estados.estado')
            ->where('historial_practicas.id_voluntario', '!=', $user)
            ->get();


        $practicasDelVoluntario = DB::table('practicas')
            ->join('historial_practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
            ->join('personas', 'personas.id', '=', 'historial_practicas.id_voluntario')
            ->join('estados', 'estados.id', '=', 'historial_practicas.id_estado')
            ->select('personas.nombre', 'personas.apellido', 'personas.mail', 'personas.telefono', 'practicas.nombre_practica', 'practicas.precio', 'historial_practicas.id_practica', 'historial_practicas.id as id_historial_practicas', 'historial_practicas.created_at', 'estados.estado')
            ->where('historial_practicas.id_voluntario', $user)
            ->get();
        
        return view('/listadoPracticasEstados')->with('rubros',$rubros)->with('practicasDelVoluntario',$practicasDelVoluntario)->with('practicasDelPracticante',$practicasDelPracticante);

        //dd($practicasDelPracticante);
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

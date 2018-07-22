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

class PracticasController extends Controller
{
    public function listadoPracticasEstados(Request $req){

        $rubros = Rubro::all();
        $req = Session::get('mail');
        $user = Persona::where('mail', $req)->first()->id;

        //Traigo todas las practicas en donde el id del practicante coincida con el logueado
        

        /*$todasLasPracticas = Practica::where('id_practicante', $user)->get();

        $practicasDelVoluntario = Historial_Practica::where('id_voluntario', $user)->where('password', '=', $password)->get();

        $practicasDelPracticante = Historial_Practica::where('id_voluntario', '!=' , $user)->get();
        */

        $practicasDelPracticante = DB::table('practicas')
            ->join('historial_practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
            ->join('personas', 'personas.id', '=', 'historial_practicas.id_voluntario')
            //->join('personas', 'personas.id', '=', 'practicas.id_practicante')
            ->join('estados', 'estados.id', '=', 'historial_practicas.id_estado')
            ->select('personas.nombre', 'personas.apellido', 'personas.mail', 'personas.telefono', 'practicas.nombre_practica', 'practicas.precio', 'historial_practicas.created_at', 'estados.estado')
            ->where('historial_practicas.id_voluntario', '!=', $user)
            //->where('practicas.id_practicante', $user)
            ->get();


        $practicasDelVoluntario = DB::table('practicas')
            ->join('historial_practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
            ->join('personas', 'personas.id', '=', 'historial_practicas.id_voluntario')
            //->join('personas', 'personas.id', '=', 'practicas.id_practicante')
            ->join('estados', 'estados.id', '=', 'historial_practicas.id_estado')
            ->select('personas.nombre', 'personas.apellido', 'personas.mail', 'personas.telefono', 'practicas.nombre_practica', 'practicas.precio', 'historial_practicas.created_at', 'estados.estado')
            ->where('historial_practicas.id_voluntario', $user)
            //->where('practicas.id_practicante', $user)
            ->get();

            /*
        $practicasDelVoluntario = DB::table('practicas')
            ->join('historial_practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
            ->select('practicas.*')
            ->where('practicas.id_practicante', $user)
            ->where('historial_practicas.id_voluntario', $user)
            ->get();*/

        //$idPra = Practica::where('id_practicante', $user)->get()->id;
        //$estados = Estado::where('id_practica', '$idPra')->get();

        //$estados = Estado::where('id_practica', $soyPracticante->id);
        //$soyVoluntario = ;
        
        return view('/listadoPracticasEstados')->with('rubros',$rubros)->with('practicasDelVoluntario',$practicasDelVoluntario)->with('practicasDelPracticante',$practicasDelPracticante);

        //dd($practicasDelPracticante);
    }
}

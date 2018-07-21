<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Rubro;
use App\Servicio;
use App\Practica;
use App\Estado;
use App\Historial_Practica;
use Session; 

class PracticasController extends Controller
{
    public function listadoPracticasEstados(Request $req){

        $rubros = Rubro::all();
        $req = Session::get('mail');
        $user = Persona::where('mail', $req)->first()->id;

        $soyPracticante = Practica::where('id_practicante', $user)->get();

        $soyPracticante->Historial_Practica = Historial_Practica::where('id', $soyPracticante->id)->get();

        //$idPra = Practica::where('id_practicante', $user)->get()->id;
        //$estados = Estado::where('id_practica', '$idPra')->get();

        //$estados = Estado::where('id_practica', $soyPracticante->id);
        //$soyVoluntario = ;
        
        //return view('/listadoPracticasEstados')->with('rubros',$rubros);

        dd($soyPracticante->Historial_Practica);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Rubro;
use App\Servicio;
use App\Practica;
use App\PersonasServicios;
use App\Http\Requests;
use Exception;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Session; 

class OfertaController extends Controller
{
    public function oferta($id){ 

        $rubros = Rubro::all();
        $practicaPersona = DB::Select('select practicas.id as practica_id, nombre_practica, img, imagen_practica, username, precio, descripcion from practicas 
        							   inner join personas on practicas.id_practicante = personas.id 
        							   where practicas.id = '.$id.'');

        /*      $practicaPersona= Practica::where('id', $id)->first();
        $practicaPersona->Persona = Persona::where('id', $practicaPersona->id_practicante)->first();*/

        return view('oferta')->with('rubros', $rubros)->with('practicaPersona', $practicaPersona); 
        //dd($practicaPersona);
    }

    
    public function adquirirPractica(Request $req){

        //$session_id = session()->getId();
        $req = Session::get('mail');

        if ( $req ){
            $idVoluntario = DB::table('personas')->where('mail', $req)->first()->id;
        
            $historial_practicas = new HitorialPracticas();
            $historial_practicas->id_estado = '1';
            $historial_practicas->id_voluntario = $idVoluntario;
            $historial_practicas->save();
        }
    }
}

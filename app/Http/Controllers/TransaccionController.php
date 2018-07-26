<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rubro;
use App\Servicio;
use App\Persona;
use App\Practica;
use App\Transaccion;
use App\PersonasServicios;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session; 
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class TransaccionController extends Controller
{
     public function verTransacciones(Request $req){

        $rubros = Rubro::all();
        
        $mail = Session::get('mail');
        $user = Persona::where('mail', $mail)->get(['id']);

        /*$personaTransaccion = DB::table('transacciones')
                                    ->leftJoin('historial_practicas', 'historial_practicas.id' ,'=', 'transacciones.historial_practica')
                                    ->where()
                                    ->get();*/
        
        return view('/transacciones')->with('rubros',$rubros);

        //dd($personaTransaccion);
    }
}

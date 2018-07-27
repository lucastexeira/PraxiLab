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
        $idUser = DB::table('personas')->where('mail', $mail)->first(['id']);

        $usuario = $idUser->id;

        $cantidadCreditos = DB::table('personas')->where('mail', $mail)->first(['cantidad_creditos']);

        $cantidad = $cantidadCreditos->cantidad_creditos;

        $personaTransaccion = DB::table('transacciones')
                            ->leftjoin('historial_practicas', 'historial_practicas.id','=','transacciones.historial_practica')
                            ->leftjoin('practicas', 'practicas.id','=','historial_practicas.id_practica')
                            ->join('personas', 'personas.id','=','transacciones.id_emisor')
                            ->where('id_emisor',$usuario)
                            ->orWhere('id_destinatario', $usuario)
                            ->orderBy('transacciones.created_at','desc')
                            ->get();

        
        
        //return view('/transacciones')->with('rubros',$rubros);

        dd($personaTransaccion);
    }
}

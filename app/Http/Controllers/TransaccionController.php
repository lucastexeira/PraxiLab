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
        
        // variables para la barra
        $rubros = Rubro::all();
        $req = Session::get('mail');
        $id = Persona::where('mail', $req)->first()->id;
        $persona = Persona::find($id);
        
        $mail = Session::get('mail');
        $idUser = DB::table('personas')->where('mail', $mail)->first(['id']);

        $usuario = $idUser->id;

        $cantidadCreditos = DB::table('personas')->where('mail', $mail)->first(['cantidad_creditos']);

        $cantidad = $cantidadCreditos->cantidad_creditos;
        
        $mes_cantidad = DB::table('transacciones')
                            ->join('compra_mercadopago', 'compra_mercadopago.id_transaccion_mp', '=','transacciones.id_transaccione_mercadopago')
                            ->where('transacciones.id_destinatario',$usuario)
                            ->where('transacciones.id_emisor',$usuario)
                            ->sum('cantidad_meses');
        
        if($mes_cantidad == null) {
            $mes_cantidad = 0;
        }

        $personaTransaccion = DB::table('transacciones')
                            ->leftjoin('historial_practicas', 'historial_practicas.id','=','transacciones.historial_practica')
                            ->leftjoin('practicas', 'practicas.id','=','historial_practicas.id_practica')
                            ->join('personas', 'personas.id','=','transacciones.id_emisor')
                            ->select('id_practica', 'transacciones.created_at', 'nombre_practica','id_destinatario','id_emisor','monto_transferido', 'transacciones.estado')
                            ->where('id_emisor',$usuario)
                            ->orWhere('id_destinatario', $usuario)
                            ->orderBy('transacciones.created_at','desc')
                            ->get();

        $todasPersonas = DB::table('personas')
                    ->get();
                            
        return view('/transacciones')->with('rubros',$rubros)->with('mes_cantidad',$mes_cantidad)->with('personaTransaccion',$personaTransaccion)->with('usuario',$usuario)->with('cantidad',$cantidad)->with('persona',$persona)->with('todasPersonas',$todasPersonas);

        //dd($personaTransaccion);
    }
}

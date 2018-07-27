<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Transaccion;
use App\Rubro;
use App\CompraMercadoPago;
use MP;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\App;


class MercadoPagoController extends Controller
{
    public function compraMP(Request $req){ 
        $mail = Session::get('mail');
        $idUser = DB::table('personas')->where('mail', $mail)->first(['id']);
        
        //$mp = new MP('8472593339549232', 'bwvYT6Hd3jXf1pjiwpZvE4z8PD3YZKV6');
        $mp = new MP('149347024881692', '1sxwddTWdF9GsFwhItyEsdJNGi1QYx2w');

        $monto = Input::get('monto');
        $mes = Input::get('meses');

        $usuario = $idUser->id;
        
        $hash = hash ('md5', 'identificacionDeTransaccion');

        if($monto!=0 && $mes==0){
            $titulo = "Creditos Praxilab";
            $precio = $monto + $monto * 0.05;
        }
        elseif($monto==null && $mes!=0){
            $titulo = "Suscripcion Praxilab";
            $precio = $mes*100;
        }
        else{
            $titulo = "Creditos mas Suscripcion Praxilab";
            $precio = $mes*100 + ($monto + $monto * 0.05); 
        }


        $preference_data = array(
            "id" => 11,
            "items" => array(
                array(
                    "id" => $hash,
                    "title" => $titulo,
                    "quantity" => 1,
                    "currency_id" => "ARS", // Available currencies at: https://api.mercadopago.com/currencies
                    "unit_price" => $precio,
                    "picture_url" => ''
                )
            ),
            "payer" => array(
                array(
                    "name" => "Nombre",
                    "surname" => "Apellido",
                    "email" => $mail,
                    "identification" => array(
                        "type" => "doc",
                        "number" => "121",
                    )
                )
            ),
            "back_urls" => array(
                "success" => URL::to('confirmarPago'),
                "failed" => URL::to('confirmarPago'),
                "pending" => URL::to('confirmarPago')
            ),
            "auto_return" => "approved",
            "external_reference" => "",
            "expires" => false,
            "expiration_date_from" => null,
            "expiration_date_to" => null
        );

        $preference = $mp->create_preference($preference_data);
        
        $url = $preference['response']['init_point'];

        $idTransaccionMercadoPago = $preference['response']['id'];


        $transaccion = new Transaccion();
        $transaccion->monto_transferido = $monto;
        $transaccion->id_emisor = $usuario;
        $transaccion->id_destinatario = $usuario;
        $transaccion->historial_practica = null;
        $transaccion->id_transaccione_mercadopago = $idTransaccionMercadoPago;
        $transaccion->estado = 1;
        $transaccion->save();

        $compraMercadoPago = new CompraMercadoPago();
        $compraMercadoPago->monto_creditos = $monto;
        $compraMercadoPago->cantidad_meses = $mes;
        $compraMercadoPago->estado = 1;
        $compraMercadoPago->id_transaccion_mp = $idTransaccionMercadoPago;
        $compraMercadoPago->save();


        return Redirect::to($url);

        //dd($preference);
    }


    public function crearUsuarioMP(){

        $mp = new MP('8472593339549232', 'bwvYT6Hd3jXf1pjiwpZvE4z8PD3YZKV6');
        $mp->sandbox_mode(FALSE);
       
        $body = array(
            "site_id" => "MLA"
        );
      
        $result = $mp->post('/users/test_user', $body);
      
        dd($result);

    }

    public function confirmarPago(Request $req){ 
        $mail = Session::get('mail');
        $rubros = Rubro::all();

        //$mp = new MP('8472593339549232', 'bwvYT6Hd3jXf1pjiwpZvE4z8PD3YZKV6');
        $mp = new MP('149347024881692', '1sxwddTWdF9GsFwhItyEsdJNGi1QYx2w');
       
        $payment_info = $mp->get_payment_info($_GET["collection_id"]);

        $id_preference = Input::get('preference_id');

        if ($payment_info["status"] == 200) {

            // Actualiza la cantidad de creditos del usuario y crea registro en la rabla transacciones
            $cantidadCreditosActual = DB::table('personas')->where('mail', $mail)->first(['cantidad_creditos']);

            DB::table('transacciones')
                    ->where('id_transaccione_mercadopago', $id_preference)
                    ->update(['estado' => 0]);
            
            DB::table('compra_mercadopago')
                    ->where('id_transaccion_mp', $id_preference)
                    ->update(['estado' => 0]);

            $monto=DB::table('transacciones')
                        ->where('id_transaccione_mercadopago', $id_preference)
                        ->first(['monto_transferido']);
            $m = $monto->monto_transferido;

            $cant = $cantidadCreditosActual->cantidad_creditos;

            //$usuario = $idUser->id;

            $montoAGuardar = $m + $cant;

            DB::table('personas')
                    ->where('mail', $mail)
                    ->update(['cantidad_creditos' => $montoAGuardar]);
            
            $mensaje = "El pago se efectuo Correctamente";
            $check = "check.png";

            return view('/estadoPago')->with('rubros', $rubros)->with('check', $check)->with('mensaje', $mensaje);
            //dd($m);
        }
        else{
            $mensaje = "El pago NO se completo";
            $check = "checkRojo.png";
            return view('/estadoPago')->with('rubros', $rubros)->with('check', $check)->with('mensaje', $mensaje);
            //dd($payment_info["response"]);
        }

        

    }
}

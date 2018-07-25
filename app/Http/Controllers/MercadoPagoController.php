<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Transaccion;
use App\Rubro;
use MP;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Redirect;

class MercadoPagoController extends Controller
{
    public function compraMP(Request $req){ 
        $mail = Session::get('mail');
        $idUser = DB::table('personas')->where('mail', $mail)->first(['id']);
        //$mail = $req->input('mail');
        //$mp = new MP ("TEST-0cdf6519-1e50-4ccd-8e93-a44aecec08ab", "TEST-8472593339549232-072113-1bd9da49c68ace86fe66f74afcf6b919-294144857");
        $mp = new MP('8472593339549232', 'bwvYT6Hd3jXf1pjiwpZvE4z8PD3YZKV6');
        $mp->sandbox_mode(TRUE);
        //https://api.mercadopago.com/users/8472593339549232/mercadopago_account/balance?access_token=bwvYT6Hd3jXf1pjiwpZvE4z8PD3YZKV6

        $monto = Input::get('monto');
        $mes = Input::get('meses');

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
            "items" => array(
                array(
                    "id" => "",
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
                "success" => "localhost/index",
                "failed" => "localhost/index",
                "pending" => "localhost/index"
            ),
            "auto_return" => "approved",
            "external_reference" => "",
            "expires" => false,
            "expiration_date_from" => null,
            "expiration_date_to" => null
        );

        $preference = $mp->create_preference($preference_data);


        // Actualiza la cantidad de creditos del usuario y crea registro en la rabla transacciones
        $cantidadCreditosActual = DB::table('personas')->where('mail', $mail)->first(['cantidad_creditos']);

        floatval($monto);

        $cant = $cantidadCreditosActual->cantidad_creditos;

        $usuario = $idUser->id;

        $montoAGuardar = $monto + $cant;

        DB::table('personas')
                ->where('mail', $mail)
                ->update(['cantidad_creditos' => $montoAGuardar]);

        $transaccion = new Transaccion();
        $transaccion->monto_transferido = $monto;
        $transaccion->id_emisor = $usuario;
        $transaccion->id_destinatario = $usuario;
        $transaccion->historial_practica = null;
        $transaccion->save();
        
        $url = $preference['response']['init_point'];

        //return Redirect::to($url);
        dd($preference);
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
    /*public function beforeAction($action)
    {
        if ($action->id == 'notification') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }*/


    //     //Create Customer
    //      $mp->post (
    //          array(
    //              "uri" => "/v1/customers",
    //              "data" => array(
    //                  "email" => $mail
    //              )
    //          )
    //      );

    //     //Create Payment
    //     $data = array (
    //         "items" => array (
    //             array (
    //                 "title" => "Test Modified",
    //                 "quantity" => 1,
    //                 "currency_id" => "USD",
    //                 "unit_price" => 20.4
    //             )
    //         )
    //     );

    //     $mp->post (
    //         array(
    //             "uri" => "/v1/payments",
    //             "data" => $data
    //         )
    //     );*/
}

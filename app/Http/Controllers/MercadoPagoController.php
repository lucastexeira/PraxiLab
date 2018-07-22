<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Transaccion;
use MP;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

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

        
        $preference_data = array(
            "items" => array(
                array(
                    "title" => "Trisky Gato",
                    "quantity" => 1,
                    "currency_id" => "ARS", // Available currencies at: https://api.mercadopago.com/currencies
                    "unit_price" => 0.05
                    )
                ),
            "payer" => array(
                array(
                    "name" => "Usuario1",
                    "surname" => "Apellido",
                    "email" => $mail
                ), 
                "back_urls" => array( 
                    "success" => "localhost"."/payment/approved"// imagino que aca va otra url  
                ), 
                "expires" => false, 
                "expiration_date_from" => null, 
                "expiration_date_to" => null 
            )
        );

        $preference = $mp->create_preference($preference_data);

        $cantidadCreditosActual = DB::table('personas')->where('mail', $mail)->first(['cantidad_creditos']);

        $monto = Input::get('monto');

        floatval($monto);

        $cant = $cantidadCreditosActual->cantidad_creditos;

        $montoAGuardar = $monto + $cant;

        DB::table('personas')
                    ->where('mail', $mail)
                    ->update(['cantidad_creditos' => $montoAGuardar]);

        /*DB::table('transacciones')->insert([
            ['monto_transferido' => '654', 'id_emisor' => '0', 'id_destinatario' => $idUser , 'historial_practica' => '0']
        ]);*/

        $transaccion = new Transaccion();
        $transaccion->monto_transferido = $monto;
        $transaccion->id_emisor = 0;
        $transaccion->id_destinatario = $idUser;
        $transaccion->historial_practica = 0;
        $transaccion->save();


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

       dd($montoAGuardar);
    }


    /*public function beforeAction($action)
    {
        if ($action->id == 'notification') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }*/

}

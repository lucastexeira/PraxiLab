<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MP;
use Session;

class MercadoPagoController extends Controller
{
    public function compraMP(Request $req){ 
        $mail = $req->input('mail');
        //$mp = new MP ("TEST-0cdf6519-1e50-4ccd-8e93-a44aecec08ab", "TEST-8472593339549232-072113-1bd9da49c68ace86fe66f74afcf6b919-294144857");
        $mp = new MP('8472593339549232', 'bwvYT6Hd3jXf1pjiwpZvE4z8PD3YZKV6');

        //https://api.mercadopago.com/users/8472593339549232/mercadopago_account/balance?access_token=bwvYT6Hd3jXf1pjiwpZvE4z8PD3YZKV6

        
        $preference_data = array(
            "items" => array(
                array(
                    "title" => "Trisky Gato",
                    "quantity" => 1,
                    "currency_id" => "ARS", // Available currencies at: https://api.mercadopago.com/currencies
                    "unit_price" => 0.05
                )
            )
            
        );

        $mp->post (
                array(
                    "uri" => "/v1/customers",
                    "data" => array(
                        "email" => $mail
                    )
                )
            );

        $preference = $mp->create_preference($preference_data);

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
    //     );

        print_r ($mp);
    }


    /*public function beforeAction($action)
    {
        if ($action->id == 'notification') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }*/

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MercadoPagoController extends Controller
{
    public function compraMP(Request $req){ 

        $mail = $req->input('mail');
		/*$mp = new MP ("", "");*/

		dd($mail);
    }
}

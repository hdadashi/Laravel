<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function buyProductByPix(Request $request) {          

        \MercadoPago\SDK::setAccessToken($_ENV["MERCADOPAGO_ACCESS_TOKEN"]);

        $payment = new \MercadoPago\Payment();
        $payment->transaction_amount = 0.5;
        $payment->description = "Título do produto";
        $payment->payment_method_id = "pix";
        $payment->payer = array(
            "email" => "test@test.com",
            "first_name" => "Test",
            "last_name" => "User",
            "identification" => array(
                "type" => "CPF",
                "number" => "19119119100"
            ),
            "address"=>  array(
                "zip_code" => "06233200",
                "street_name" => "Av. das Nações Unidas",
                "street_number" => "3003",
                "neighborhood" => "Bonfim",
                "city" => "Osasco",
                "federal_unit" => "SP"
            )
        );

        $payment->save();

        return response()->json($payment->point_of_interaction->transaction_data);
    }
}

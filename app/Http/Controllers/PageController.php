<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index() {

        $products = DB::table("products")->get();
        return view("welcome", ["products" => $products]);
    }

    public function about() {
        return view("about");
    }

    public function contact() {
        return view("contact");
    }

    public function terms() {
        return view("terms");
    } 
 
    public function services() {
        return view("services");
    } 

    public function product(int $id = null) {

        \MercadoPago\SDK::setAccessToken($_ENV["MERCADOPAGO_ACCESS_TOKEN"]);

        $product = DB::table("products")
            ->where("id", "=", $id)
            ->select("id", "title", "description", "amount", "category")
            ->get();

        $preference = new \MercadoPago\Preference();

        $item = new \MercadoPago\Item();
        $item->title = $product[0]->title;
        $item->quantity = 1;
        $item->unit_price = (float) $product[0]->amount;
        $item->description = $product[0]->description;
        $item->category_id = $product[0]->category;
        $item->currency_id = "BRL";

        $preference->items = array($item);
        $preference->payment_methods = [
            "excluded_payment_methods" => [
                [
                    "id" => "paypal",
                ]
            ]
        ];

        $preference->save();
            
        return view("product", ["product" => $product, "preferenceId" => $preference->id]);
    }    
}

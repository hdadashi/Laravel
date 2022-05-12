<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index() {
        return view("welcome");
    }

    public function products(?int $id = null) {

        if ($id == null) {

            $products = DB::table("products")->get();
            
            return view("products", ["products" => $products]);
        }

        $product = DB::table("products")->where("id", "=", $id)->select("id", "title", "description", "amount", "thumbs")->get();

        return view("buy_product", ["product" => $product]);
    }

    public function processPayment(string $method, int $id) {

        if ($method === "credit-card") {
            // ..
        }

        return view("process_payment", [
            "method" => $method
        ]);
    }
}

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

    public function product(int $id = null) {

        $product = DB::table("products")
            ->where("id", "=", $id)
            ->select("id", "title", "description", "amount", "thumbs")
            ->get();

        return view("product", ["product" => $product]);
    }

    public function processPayment(string $method, int $id) {  

        if ($method === "pix") {
            return view("process_payment", [
                "method" => $method,
            ]);
        }
    }
}

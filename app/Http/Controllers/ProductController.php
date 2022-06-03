<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function search(Request $request) {
        dd($request->search);
    }

    public function searchByKeypress(Request $request) {
 
        $products = DB::table("products")
            ->where("title", "like", "{$request->data}%")
            ->select("id", "title", "amount", "description")
            ->get(); 

        return $products;
    }
}

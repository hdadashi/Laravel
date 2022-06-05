<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function search(Request $request) {

        $search = filter_var($request->search, FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty(trim($search))) {
            return redirect("/search")->with("products", null);
        }

        $products = DB::table("products")
            ->where("title", "like", "{$search}%")
            ->select("id", "title", "amount", "thumbs", "description")
            ->get(); 

        if (count($products) < 1) {
            return redirect("/search")->with("products", null);
        }

        return redirect("/search")->with("products", $products);
        
    }

    public function searchByKeypress(Request $request) {
 
        $products = DB::table("products")
            ->where("title", "like", "{$request->data}%")
            ->select("id", "title", "amount", "description")
            ->get(); 

        return $products;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function buyProductByCreditCard(Request $request) {
        return response()->json(['Laravel CORS Demo']);
    }
}

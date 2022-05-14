<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;

Route::controller(PageController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/product/{id}", "product");
    Route::get("/process-payment/{method}/{id}", "processPayment");
});

Route::controller(ProductController::class)->group(function () {
    Route::post("/product/buy/pix", "buyProductByPix");
});


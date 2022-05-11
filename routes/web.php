<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;

Route::controller(PageController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/products/{id?}", "products");
    Route::get("/process-payment", "processPayment");
});

Route::controller(ProductController::class)->group(function () {
    Route::post("/products/buy", "buy");
});

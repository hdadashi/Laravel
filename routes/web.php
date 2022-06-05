<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;

Route::controller(PageController::class)->group(function () {
    Route::get("/", "index");

    Route::get("/about", fn() => view("about"));
    Route::get("/contact", fn() => view("contact"));
    Route::get("/terms", fn() => view("terms"));
    Route::get("/services", fn() => view("services"));

    Route::get("/product/{id}", "product");
    Route::get("/search", "search");    
});

Route::controller(ProductController::class)->group(function () {
    Route::post("/product/search", "search");
    Route::post("/product/fast-search", "searchByKeypress");
});


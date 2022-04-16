<?php

require __DIR__ . "/vendor/autoload.php";

$router = new \Bramus\Router\Router();

$router->post("/product/create", function () {

    include_once __DIR__ . "/usecases/create-product/index.php";
    $createProductController->handle($_POST);
});

$router->post("/product/purchase", function () {

    include_once __DIR__ . "/usecases/purchase-product/index.php";
    $purchaseProductController->handle($_POST);
});

$router->run();


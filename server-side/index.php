<?php

require __DIR__ . "/vendor/autoload.php";

/*
 * Loading system environment variables, it is recommended to remove 
 * these parameters when deploying to production environment.
 *
 */

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/");
$dotenv->load();

$router = new \Bramus\Router\Router();

$router->post("/user/create", function () {
    include_once __DIR__ . "/usecases/create-user/index.php";
    $createUserController->handle($_POST);
});

$router->get("/product/get(/\d+)?", function ($id = null) {
    include_once __DIR__ . "/usecases/get-product/index.php";
    $getProductController->handle($id);
});

$router->post("/product/create", function () {
    include_once __DIR__ . "/usecases/create-product/index.php";
    $createProductController->handle($_POST);
});

$router->post("/product/purchase", function () {
    include_once __DIR__ . "/usecases/purchase-product/index.php";
    $purchaseProductController->handle($_POST);
});

$router->run();


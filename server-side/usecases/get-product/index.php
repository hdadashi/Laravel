<?php

require_once __DIR__ . "/../../providers/implementations/PostgreProductProvider.php";
require_once __DIR__ . "/GetProductUseCase.php";
require_once __DIR__ . "/GetProductController.php";

$postgreProductProvider = new PostgreProductProvider();
$getProductUseCase = new GetProductUseCase($postgreProductProvider);

$getProductController = new GetProductController($getProductUseCase);


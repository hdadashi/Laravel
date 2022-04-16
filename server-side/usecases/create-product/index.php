<?php

require_once __DIR__ . "/../../providers/implementations/PostgreProductProvider.php";
require_once __DIR__ . "/CreateProductUseCase.php";
require_once __DIR__ . "/CreateProductController.php";

$postgreProductProvider = new PostgreProductProvider();
$purchaseProductUseCase = new CreateProductUseCase($postgreProductProvider);

$createProductController = new CreateProductController($purchaseProductUseCase);


<?php

require_once __DIR__ . "/../../providers/implementations/PostgreProductProvider.php";
require_once __DIR__ . "/CreateProductUseCase.php";
require_once __DIR__ . "/CreateProductController.php";

$postgreProductProvider = new PostgreProductProvider();
$createProductUseCase = new CreateProductUseCase($postgreProductProvider);

$createProductController = new CreateProductController($createProductUseCase);


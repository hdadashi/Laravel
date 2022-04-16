<?php

require_once __DIR__ . "/../../providers/implementations/PostgreProductProvider.php";
require_once __DIR__ . "/PurchaseProductUseCase.php";
require_once __DIR__ . "/PurchaseProductController.php";

$postgreProductProvider = new PostgreProductProvider();
$purchaseProductUseCase = new PurchaseProductUseCase($postgreProductProvider);

$purchaseProductController = new PurchaseProductController($purchaseProductUseCase);


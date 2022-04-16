<?php

include_once __DIR__ . "/PurchaseProductUseCase.php";

class PurchaseProductController {

    private $usecase;

    function __construct(PurchaseProductUseCase $usecase) {
        $this->usecase = $usecase;
    }

    public function handle($request) {
        $this->usecase->execute($request);
    }
}

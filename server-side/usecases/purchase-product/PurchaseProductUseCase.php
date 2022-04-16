<?php

include_once __DIR__ . "/../../providers/IProductProvider.php";

class PurchaseProductUseCase { 

    private $productProvider;

    function __construct(IProductProvider $productProvider) {
        $this->productProvider = $productProvider;
    }

    public function execute($data) {
        $this->productProvider->purchase($data);
    }
}

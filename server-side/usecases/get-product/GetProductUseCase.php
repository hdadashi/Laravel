<?php

include_once __DIR__ . "/../../providers/IProductProvider.php";

class GetProductUseCase { 

    private $productProvider;

    function __construct(IProductProvider $productProvider) {
        $this->productProvider = $productProvider;
    }

    public function execute($id): array | object {
 
        if ($id !== null) {
            return $this->productProvider->get((int) $id);
        } else {
            return $this->productProvider->get();
        }
    }
}

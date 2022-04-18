<?php

include_once __DIR__ . "/../../providers/IProductProvider.php";

class CreateProductUseCase { 

    private $productProvider;

    function __construct(IProductProvider $productProvider) {
        $this->productProvider = $productProvider;
    }

    public function execute($data): void {

        $data["name"] = filter_var($data["name"], FILTER_SANITIZE_SPECIAL_CHARS);

        if (isset($data["description"])) {
            $data["description"] = filter_var($data["description"], FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            $data["description"] = null;
        }

        if (empty($data["name"]) || empty($data["price"])) {
            throw new Exception("Campos não podem ser vázios");
        }

        $data["price"] = (float) $data["price"];

        $this->productProvider->create($data);
    }
}

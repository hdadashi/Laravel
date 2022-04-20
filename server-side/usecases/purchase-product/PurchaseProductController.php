<?php

include_once __DIR__ . "/PurchaseProductUseCase.php";

class PurchaseProductController {

    private $usecase;

    function __construct(PurchaseProductUseCase $usecase) {
        $this->usecase = $usecase;
    }

    public function handle($request) {

        try {

            $this->usecase->execute($request);

            http_response_code(200);
            echo json_encode(["success" => "Compra realizada com sucesso"]);

        } catch (Exception $err) {

            http_response_code(400);
            echo json_encode(["error" => $err->getMessage()]);
        }
    }
}

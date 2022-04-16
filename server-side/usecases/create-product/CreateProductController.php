<?php

include_once __DIR__ . "/CreateProductUseCase.php";

class CreateProductController {

    private $usecase;

    function __construct(CreateProductUseCase $usecase) {
        $this->usecase = $usecase;
    }

    public function handle($request) {

        try {
            
            $this->usecase->execute($request);
            
            http_response_code(201);
            echo json_encode(["sucess" => "Product was created"]);

        } catch (Exception $err) {
            
            http_response_code(400);
            echo json_encode(["error" => $err->getMessage()]);
        }
    }
}

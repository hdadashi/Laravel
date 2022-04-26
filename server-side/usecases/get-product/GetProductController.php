<?php

include_once __DIR__ . "/GetProductUseCase.php";

class GetProductController {

    private $usecase;

    function __construct(GetProductUseCase $usecase) {
        $this->usecase = $usecase;
    }

    public function handle($id) {

        try {
            
            $data = $this->usecase->execute($id);

            http_response_code(200);
            echo json_encode($data);

        } catch (Exception $err) {
            
            http_response_code(400);
            echo json_encode(["error" => $err->getMessage()]);
        }
    }
}

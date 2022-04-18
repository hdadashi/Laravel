<?php

include_once __DIR__ . "/CreateUserUseCase.php";

class CreateUserController {

    private $usecase;

    function __construct(CreateUserUseCase $usecase) {
        $this->usecase = $usecase;
    }

    public function handle($request) {

        try {
            
            $this->usecase->execute($request);
            
            http_response_code(201);
            echo json_encode(["success" => "Usuário criado com sucesso"]);

        } catch (Exception $err) {
            
            http_response_code(400);
            echo json_encode(["error" => $err->getMessage()]);
        }
    }
}

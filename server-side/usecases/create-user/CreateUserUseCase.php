<?php

include_once __DIR__ . "/../../providers/IUserProvider.php";

class CreateUserUseCase { 

    private $userProvider;

    function __construct(IUserProvider $userProvider) {
        $this->userProvider = $userProvider;
    }

    public function execute($data): void {

        if ($this->userProvider->findByEmail($data["email"]) === true) {
            throw new Exception("Email já cadastrado");
        }

        if ($this->userProvider->findByCpf($data["cpf"]) === true) {
            throw new Exception("CPF já cadastrado");
        }

        $this->userProvider->create($data);
    }
}

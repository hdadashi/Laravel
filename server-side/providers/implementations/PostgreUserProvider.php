<?php

include_once __DIR__ . "/../../database/PostgreSQLConnection.php";
include_once __DIR__ . "/../IUserProvider.php";

class PostgreUserProvider extends PostgreSQLConnection implements IUserProvider {

    public function create(array $data): void {
        $this->connect();

        $stmt = $this->pdo->prepare("INSERT INTO users(
            name,
            email,
            cpf,
            cep,
            password,
            state,
            city
        ) VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt->bindParam(1, $data["name"]);
        $stmt->bindParam(2, $data["email"]);
        $stmt->bindParam(3, $data["cpf"]);
        $stmt->bindParam(4, $data["cep"]);
        $stmt->bindParam(5, $data["password"]);
        $stmt->bindParam(6, $data["state"]);
        $stmt->bindParam(7, $data["city"]);

        $stmt->execute();

        $this->close();

    }

    public function findByEmail(string $email): bool {
        $this->connect();

        $stmt = $this->pdo->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bindParam(1, $email);
        $stmt->execute();
        $existsEmail = $stmt->fetch();

        $this->close(); 

        if (empty($existsEmail->email)) {
            return false;
        } else {
            return true;
        }
    }

    public function findByCPF(string $cpf): bool {
        $this->connect();

        $stmt = $this->pdo->prepare("SELECT cpf FROM users WHERE cpf = ?");
        $stmt->bindParam(1, $cpf);
        $stmt->execute();
        $existsCpf = $stmt->fetch();

        $this->close(); 

        if (empty($existsCpf->cpf)) {
            return false;
        } else {
            return true;
        }
    } 
}

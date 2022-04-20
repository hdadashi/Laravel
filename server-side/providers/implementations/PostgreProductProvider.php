<?php

include_once __DIR__ . "/../../database/PostgreSQLConnection.php";
include_once __DIR__ . "/../IProductProvider.php";

class PostgreProductProvider extends PostgreSQLConnection implements IProductProvider {

    public function create(array $data): void {
        $this->connect();

        $stmt = $this->pdo->prepare("INSERT INTO products(
            name,
            price,
            description,
            thumbs,
            category
        ) VALUES (
            '{$data["name"]}',
            '{$data["price"]}',
            '{$data["description"]}',
            '{$data["thumbs"]}',
            '{$data["category"]}'
        )");

        $stmt->execute();

        $this->close();
    } 

    public function purchase(array $data): void {
        $this->connect();
        
        $stmt = $this->pdo->prepare("INSERT INTO purchases( user_id, product_id) VALUES (?, ?)");

        $stmt->bindParam(1, $data["user_id"]);
        $stmt->bindParam(2, $data["product_id"]);

        $stmt->execute();

        $this->close(); 
    } 
}

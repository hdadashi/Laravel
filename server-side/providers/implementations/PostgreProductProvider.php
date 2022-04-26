<?php

include_once __DIR__ . "/../../database/PostgreSQLConnection.php";
include_once __DIR__ . "/../IProductProvider.php";

class PostgreProductProvider extends PostgreSQLConnection implements IProductProvider {

    public function get(?int $id = null): object | array {
        $this->connect();
    
        if ($id === null) {
            $stmt = $this->pdo->prepare("SELECT * FROM products;");
            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;
        
        } else {
            $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?;");
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $data = $stmt->fetch();

            return $data;
        }
    }

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

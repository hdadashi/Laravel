<?php

class PostgreSQLConnection {
    protected $pdo;

    public function connect() {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
        $dotenv->load();

        $host = $_ENV["DB_HOST"];
        $name = $_ENV["DB_NAME"];
        $user = $_ENV["DB_USER"];
        $pass = $_ENV["DB_PASSWORD"];

        $this->pdo = new PDO("pgsql:host={$host};dbname={$name}", $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $this->pdo;
        
    }

    public function close() {
        $this->pdo = null;
    }
}

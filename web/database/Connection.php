<?php

namespace Hill\Database;

use \PDO;

class Connection {

    private $connection;

    protected function connect() {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . "/../../");
        $dotenv->load();

        try {
            $pdoConfig = "pgsql:host=". $_ENV["DB_HOST"] .";dbname=". $_ENV["DB_NAME"];

            $this->connection = new PDO($pdoConfig, $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->connection;

        } catch (PDOException $e) {
            echo "Connection failed: {$e->getMessage()}";
        }
    }
}

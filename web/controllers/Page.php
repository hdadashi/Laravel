<?php

namespace Hill\Controllers;

use Hill\Database\Connection;

class Page extends Connection {

    public function update() {
        
        ["name" => $name] = $_REQUEST;

        $stmt = $this->connect()->prepare("UPDATE pages SET name = '{$name}' WHERE name = '{$name}'");
        $stmt->execute();
        $stmt = null;

        echo $name;
    }

    public function read(): Array {
        $stmt = $this->connect()->prepare("SELECT * FROM pages");
        $stmt->execute();

        $pages = $stmt->fetchAll(); 

        $stmt = null;  

        return $pages;
   }
}


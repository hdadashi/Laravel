<?php

namespace Hill\Controllers;

use Hill\Database\Connection;

class Page extends Connection {

    public function update() {

        ["id" => $id, "name" => $name] = $_REQUEST;

        $name = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        if (empty($name) || preg_match("~[0-9]+~", $name) != 0) {

            session_start();

            $_SESSION["error"] = "Error naming page";

            return redirect("/admin/dashboard");
        }

        $pages = $this->read();

        foreach ($pages as $page) {
            if ($page["name"] === $name) {
                session_start();

                $_SESSION["error"] = "This name already exists";

                return redirect("/admin/dashboard");
            }
        }

        $stmt = $this->connect()->prepare("UPDATE pages SET name = ? WHERE id = ?");
        $stmt->execute([$name, $id]);

        return redirect("/admin/dashboard");
    }

    public function read(): Array {
        $stmt = $this->connect()->prepare("SELECT * FROM pages");
        $stmt->execute();

        $pages = $stmt->fetchAll(); 

        $stmt = null;  

        return $pages;
    }
}


<?php

namespace Hill\Usecases;

use Hill\Database\Connection;

class Admin extends Connection {
 
    public function create() {
        
        $errorMessage;

        [
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "passwordConfirm" => $passwordConfirm

        ] = $_REQUEST;

        if ($name && $email && $password && $passwordConfirm) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS); 

                if (preg_match("/^([a-z]|[A-Z]|[0-9]| |_|-)+$/", $name)) {

                    if (preg_match("~[0-9]+~", $name) == 0) {

                        if ($password === $passwordConfirm) {

                            if (strlen($password) >= 8) {

                                $stmt = $this->connect()->prepare("SELECT email FROM users WHERE email = ?");
                                $stmt->execute([$email]);
                                $res = $stmt->fetch();  

                                $stmt = null;

                                if (!$res) {

                                    $insertSQL = "INSERT INTO users(name, email, password, is_admin) VALUES (?, ?, ?, ?)";

                                    $hash = password_hash($password, PASSWORD_DEFAULT);

                                    $stmt = $this->connect()->prepare($insertSQL)->execute([$name, strtolower($email), $hash, true]);
                                    $stmt = null;

                                    redirect("/admin", 200);

                                } else {
                                    $errorMessage = "Email already exists";    
                                }

                            } else {
                                $errorMessage = "Password must be at least 8 characters long";
                            }  

                        } else {
                            $errorMessage = "Passwords not match";
                        }

                    } else {
                        $errorMessage = "Invalid name format";
                    }

                } else {
                    $errorMessage = "Invalid name format";
                }

            } else {
                $errorMessage = "Invalid email format";
            }
        } else {
            $errorMessage = "Fields cannot be empty";
        }

        if (isset($errorMessage)) {
            echo $errorMessage;
        }
    }

    public function exists(): bool {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE is_admin = true");
        $stmt->execute();

        $res = $stmt->fetchAll();

        $stmt = null;

        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }

    public function login() {
        
        $errorMessage;

        ["email" => $email, "password" => $password] = $_REQUEST;

        if ($email && $password) {

            $query = "SELECT * FROM users WHERE email = ? AND is_admin = true";

            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$email]);
            $res = $stmt->fetch();      

            $stmt = null;

            if ($res) {

                if (password_verify($password, $res["password"])) {

                    session_start();

                    $_SESSION["admin"] = $res;

                    redirect("/admin/dashboard");

                } else {
                    $errorMessage = "Invalid password";
                }

            } else {
                $errorMessage = "Administrator not found";
            }

        } else {
            $errorMessage = "Fields cannot be empty";
        }

        if (isset($errorMessage)) {
            echo $errorMessage;
        }
    }
}


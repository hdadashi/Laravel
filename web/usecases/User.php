<?php

namespace Hill\Usecases;

require __DIR__ . "/../database/Connection.php";

use Hill\Database\Connection;

class User extends Connection {

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

                                    $insertSQL = "INSERT INTO users(name, email, password) VALUES (?, ?, ?)";

                                    $hash = password_hash($password, PASSWORD_DEFAULT);

                                    $stmt = $this->connect()->prepare($insertSQL)->execute([$name, strtolower($email), $hash]);
                                    $stmt = null;

                                    redirect("/", 200);

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

    public function delete() {
        // ..
    }

    public function update() {
        // ..
    }

    public function login() {

        $errorMessage;

        ["email" => $email, "password" => $password] = $_REQUEST;

        if ($email && $password) {

            $query = "SELECT * FROM users WHERE email = ?";
            
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$email]);
            $res = $stmt->fetch();      

            $stmt = null;

            if ($res) {
                
                if (password_verify($password, $res["password"])) {

                    session_start();
                    
                    $_SESSION["user"] = $res;

                    redirect("/home");

                } else {
                    $errorMessage = "Invalid password";
                }

            } else {
                $errorMessage = "Email not found";
            }

        } else {
            $errorMessage = "Fields cannot be empty";
        }

        if (isset($errorMessage)) {
            echo $errorMessage;
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();

        redirect("/");
    }
}  


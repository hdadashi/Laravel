<?php

namespace Hill\Usecases;

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
                $name = filter_var($name, FILTER_SANITIZE_STRING);

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
                $errorMessage = "Invalid email format";
            }
        } else {
            $errorMessage = "Fields cannot be empty";
        }

        if (isset($errorMessage)) {

            session_start();

            $_SESSION["error"] = $errorMessage;

            redirect("/register");
        }
    }

    public function delete() {
        session_start();

        $id = $_SESSION["user"]["id"];

        $stmt = $this->connect()->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);

        session_unset();
        session_destroy();

        redirect("/");
    }

    public function update() {
        ["name" => $name, "email" => $email] = $_REQUEST;
        $errorMessage;

        session_start();

        $id = $_SESSION["user"]["id"];

        $userDataStmt = $this->connect()->prepare("SELECT * FROM users WHERE id = ?");
        $userDataStmt->execute([$id]);
        $userData = $userDataStmt->fetch(); 

        if ($name && !empty($name)) {

            $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS); 

            if (preg_match("/^([a-z]|[A-Z]|[0-9]| |_|-)+$/", $name)) {

                if (preg_match("~[0-9]+~", $name) == 0) {

                    $querySQL = "UPDATE users SET name = ? WHERE id = ?";
                    $stmt = $this->connect()->prepare($querySQL)->execute([$name, $id]);
                    $stmt = null;

                } else {
                    $errorMessage = "Invalid name format";
                }

            } else {
                $errorMessage = "Invalid name format";
            }
        } 

        if ($email && !empty($email)) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                if ($userData["email"] !== $email) {

                    $stmt = $this->connect()->prepare("UPDATE users SET email = ? WHERE id = ?");
                    $stmt->execute([$email, $id]);
                    $stmt = null;

                } else {
                    $errorMessage = "Email already exists";
                }

            } else {
                $errorMessage = "Invalid email format";
            }
        }

        if (isset($errorMessage)) {
            echo $errorMessage;
        } else {
            redirect("/config/profile");
        } 
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

            session_start();

            $_SESSION["error"] = $errorMessage;

            redirect("/");

        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();

        redirect("/");
    }
}  


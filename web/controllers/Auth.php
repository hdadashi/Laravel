<?php

namespace Hill\Controllers;

class Auth {

    public static function isLogged($sessionName): bool {
        session_start();

        if (isset($_SESSION[$sessionName])) {
            return true;
        } else {
            return false;
        }
    }
}


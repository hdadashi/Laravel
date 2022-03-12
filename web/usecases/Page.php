<?php

namespace Hill\Usecases;

use Hill\Usecases\Auth;

class Page {

    private $templates;

    public function __construct(\League\Plates\Engine $templates) {
        $this->templates = $templates;
    }

    public function index() {
        if (Auth::isLogged("user")) {
            return redirect("/home");
        }
        
        return $this->templates->render("index");
    }

    public function register() {
        if (Auth::isLogged("user")) {
            return redirect("/home");
        }
        return $this->templates->render("register");
    }
    
    public function home() {
        if (Auth::isLogged("user")) {
            return $this->templates->render("home");
        }

        redirect("/");
    }
    public function admin() {
        return $this->templates->render("admin/index");
    }
}


<?php

namespace Hill\Controllers;

use Hill\Controllers\Auth;
use Hill\Controllers\Admin;

class View {

    private $templates;

    public function __construct(\League\Plates\Engine $templates) {
        $this->templates = $templates;
    }

    public function index() {
        if (Auth::isLogged("user")) {
            return redirect("/home");
        }
        
        return $this->templates->render("index", ["sla" => "sla"]);
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

    public function config() {
        if (Auth::isLogged("user")) {
            return $this->templates->render("config/index");
        }

        redirect("/");
    }

    public function profile() {
        if (Auth::isLogged("user")) {
            return $this->templates->render("config/profile");
        }

        redirect("/");
    }

    public function admin() {
        $admin = new Admin;
        
        if ($admin->exists()) {
            if (Auth::isLogged("admin")) {
                redirect("/admin/dashboard");
            }

            return $this->templates->render("admin/index");
        } else {
            redirect("/admin/create");
        }

    }

    public function adminDashboard() {
        if (Auth::isLogged("admin")) {
            return $this->templates->render("admin/dashboard");
        }

        redirect("/admin");
    }

    public function adminCreate() {
        if (Auth::isLogged("admin")) {
            redirect("/admin");
        }

        return $this->templates->render("admin/create");
    }

}


<?php

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get("/", fn() => $view->index());
Router::get("/register", fn() => $view->register());
Router::get("/home", fn() => $view->home());
Router::get("/config", fn() => $view->config());
Router::get("/config/profile", fn() => $view->profile());


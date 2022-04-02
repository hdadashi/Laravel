<?php

use Pecee\SimpleRouter\SimpleRouter as Router;

$pages = $page->read();

Router::get("/", fn() => $view->index());

foreach ($pages as $route) {
    if (method_exists($view, $route["method"])) {
        Router::get("/{$route['name']}", fn() => call_user_func_array([$view, $route["method"]], []));
    }
}


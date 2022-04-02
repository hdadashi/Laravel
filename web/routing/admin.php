<?php

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get("/admin", fn() => $view->admin());
Router::get("/admin/create", fn() => $view->adminCreate());
Router::get("/admin/dashboard", fn() => $view->adminDashboard());

Router::post("/admin/create", fn() => $admin->create());
Router::post("/admin/login", fn() => $admin->login());

Router::post("/page/update", fn() => $page->update());

Router::post("/product/create", fn() => $product->create());
Router::post("/product/update", fn() => $product->update());
Router::post("/product/delete", fn() => $product->delete());



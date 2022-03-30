<?php

require __DIR__ . "/vendor/autoload.php";

require __DIR__ . "/web/database/Connection.php";

require __DIR__ . "/web/controllers/View.php";
require __DIR__ . "/web/controllers/User.php";
require __DIR__ . "/web/controllers/Product.php";
require __DIR__ . "/web/controllers/Auth.php";
require __DIR__ . "/web/controllers/Admin.php";

require __DIR__ . "/web/controllers/helper/helper.php";

use Pecee\SimpleRouter\SimpleRouter as Router;

use Hill\Controllers\View;
use Hill\Controllers\User;
use Hill\Controllers\Admin;
use Hill\Controllers\Product;

$view = new View(new League\Plates\Engine("ui/views", "php"));
$user = new User();
$admin = new Admin();
$product = new Product();

/*
 * Routing
 *
 */

// Page

Router::get("/", fn() => $view->index());
Router::get("/register", fn() => $view->register());
Router::get("/home", fn() => $view->home());
Router::get("/config", fn() => $view->config());
Router::get("/config/profile", fn() => $view->profile());
Router::get("/admin", fn() => $view->admin());
Router::get("/admin/create", fn() => $view->adminCreate());
Router::get("/admin/dashboard", fn() => $view->adminDashboard());

// User

Router::post("/user/register", fn() => $user->create());
Router::post("/user/login", fn() => $user->login());
Router::post("/user/update", fn() => $user->update());
Router::post("/user/delete", fn() => $user->delete());

Router::get("/logout", fn() => $user->logout());

// Admin

Router::post("/admin/create", fn() => $admin->create());
Router::post("/admin/login", fn() => $admin->login());

Router::post("/product/create", fn() => $product->create());
Router::post("/product/update", fn() => $product->update());
Router::post("/product/delete", fn() => $product->delete());

// Start Routes

Router::start();

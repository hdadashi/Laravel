<?php

require __DIR__ . "/vendor/autoload.php";

require __DIR__ . "/web/database/Connection.php";

require __DIR__ . "/web/usecases/Page.php";
require __DIR__ . "/web/usecases/User.php";
require __DIR__ . "/web/usecases/Product.php";
require __DIR__ . "/web/usecases/Auth.php";
require __DIR__ . "/web/usecases/Admin.php";

require __DIR__ . "/web/usecases/helper/helper.php";

use Pecee\SimpleRouter\SimpleRouter as Router;

use Hill\Usecases\Page;
use Hill\Usecases\User;
use Hill\Usecases\Admin;
use Hill\Usecases\Product;

$page = new Page(new League\Plates\Engine("ui/views", "html"));
$user = new User();
$admin = new Admin();
$product = new Product();

/*
 * Routing
 *
 */

// Page

Router::get("/", fn() => $page->index());
Router::get("/register", fn() => $page->register());
Router::get("/home", fn() => $page->home());
Router::get("/config", fn() => $page->config());
Router::get("/config/profile", fn() => $page->profile());
Router::get("/admin", fn() => $page->admin());
Router::get("/admin/dashboard", fn() => $page->adminDashboard());

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

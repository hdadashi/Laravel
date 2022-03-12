<?php

require __DIR__ . "/vendor/autoload.php";

require __DIR__ . "/web/usecases/Page.php";
require __DIR__ . "/web/usecases/User.php";
require __DIR__ . "/web/usecases/Auth.php";

require __DIR__ . "/web/usecases/helper/helper.php";

use Pecee\SimpleRouter\SimpleRouter as Router;

use Hill\Usecases\Page;
use Hill\Usecases\User;

$page = new Page(new League\Plates\Engine("ui/views", "tpl"));
$user = new User();

/*
 * Routing
 *
 */

// Page

Router::get("/", fn() => $page->index());
Router::get("/register", fn() => $page->register());
Router::get("/home", fn() => $page->home());

// User

Router::post("/user/register", fn() => $user->create());
Router::post("/user/login", fn() => $user->login());
Router::get("/logout", fn() => $user->logout());

// Admin

Router::get("/admin", fn() => $page->admin());

// Start Routes

Router::start();

<?php

use League\Plates\Engine;
use Hill\Controllers\View;
use Hill\Controllers\User;
use Hill\Controllers\Admin;
use Hill\Controllers\Product;
use Hill\Controllers\Page;

$view = new View(new Engine("ui/views", "php"));
$user = new User();
$admin = new Admin();
$product = new Product();
$page = new Page();


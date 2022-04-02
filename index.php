<?php

require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/web/autoload.php";

importAllFrom("web/database");
importAllFrom("web/controllers");

use Pecee\SimpleRouter\SimpleRouter as Router;

require __DIR__ . '/web/defined/instances.php';

require __DIR__ . '/web/routing/pages.php';
require __DIR__ . '/web/routing/admin.php';
require __DIR__ . '/web/routing/user.php';

Router::start();

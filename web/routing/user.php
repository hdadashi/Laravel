<?php

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::post("/user/register", fn() => $user->create());
Router::post("/user/login", fn() => $user->login());
Router::post("/user/update", fn() => $user->update());
Router::post("/user/delete", fn() => $user->delete());

Router::get("/logout", fn() => $user->logout());



<?php

require_once __DIR__ . "/../../providers/implementations/PostgreUserProvider.php";
require_once __DIR__ . "/CreateUserUseCase.php";
require_once __DIR__ . "/CreateUserController.php";

$postgreUserProvider = new PostgreUserProvider();
$createUserUseCase = new CreateUserUseCase($postgreUserProvider);

$createUserController = new CreateUserController($createUserUseCase);


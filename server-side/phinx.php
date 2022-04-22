<?php

require __DIR__ . "/vendor/autoload.php";

/*
 * Loading system environment variables, it is recommended to remove 
 * these parameters when deploying to production environment.
 *
 */

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/");
$dotenv->load();

return
    [
        'paths' => [
            'migrations' => 'database/migrations'
        ],
        'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_environment' => 'production',
            'production' => [
                'adapter' => 'pgsql',
                'host' => $_ENV["DB_HOST"],
                'name' => $_ENV["DB_NAME"],
                'user' => $_ENV["DB_USER"],
                'pass' => $_ENV["DB_PASSWORD"],
                'port' => '5432',
                'charset' => 'utf8',
            ],
        ],
        'version_order' => 'creation'
    ];

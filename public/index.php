<?php

use Martian\Scandi\Classes\Router;
use Martian\Scandi\Enums\StatusCodeEnum;

require __DIR__ . '/../vendor/autoload.php';

set_error_handler(function ($severity, $message, $file, $line) {
    json(false, $message, [
        'severity' => $severity,
        'file' => $file,
        'line' => $line
    ], StatusCodeEnum::INTERNAL_SERVER_ERROR->value);
});

// Load helper functions
require __DIR__ . '/../app/helpers.php';

// Load config files
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../config/app.php';

// Create Router instance
$router = new Router;

// Load routes
require __DIR__ . '/../routes/api.php';

$router->handleRequest();
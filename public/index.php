<?php

use App\Enum\ProductTypeEnum;

require __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

// Load helper functions
require __DIR__ . '/../app/helpers.php';

// Load config files
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../config/app.php';

// Create Router instance
$router = new \ErickFirmo\Router;

// Load routes
require __DIR__ . '/../routes/api.php';

$router->run();
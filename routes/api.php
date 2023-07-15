<?php

use App\Controllers\ApplicationController;
use App\Controllers\ProductController;

/**
 * Application routes
 * 
 * @var \ErickFirmo\Router $router
 */

$router->get('/api', ApplicationController::class, 'index', 'api.index');

$router->get('/api/products', ProductController::class, 'index', 'api.products.index');

/**
 * Not found route
 */
$router->notFoundView(__DIR__ . '/../view/errors/404.php');

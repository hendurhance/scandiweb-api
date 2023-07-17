<?php

use App\Controllers\ApplicationController;
use App\Controllers\ProductController;

/**
 * Application routes
 * 
 * @var \Martian\Scandi\Classes\Router $router
 */

$router->addRoute('GET', '/api', function () {
    return (new ApplicationController())->index();
});

$router->addRoute('GET', '/api/products', function () {
    return (new ProductController())->index();
});

$router->addRoute('POST', '/api/products/store', function () {
    return (new ProductController())->store();
});

$router->addRoute('DELETE', '/api/delete', function () {
    return (new ProductController())->destroy();
});

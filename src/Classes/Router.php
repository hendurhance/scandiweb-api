<?php

namespace Martian\Scandi\Classes;

use Martian\Scandi\Enums\StatusCodeEnum;

class Router
{
    private $routes = [];
    private $notFoundHandler;

    public function addRoute($method, $path, $handler)
    {
        $this->routes[$method][$path] = $handler;
    }

    public function setNotFoundHandler($handler)
    {
        $this->notFoundHandler = $handler;
    }

    public function handleRequest()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['REQUEST_URI'];

        // Remove query string from the path
        if (($pos = strpos($path, '?')) !== false) {
            $path = substr($path, 0, $pos);
        }

        if (isset($this->routes[$method][$path])) {
            $handler = $this->routes[$method][$path];
            $this->handleCors();
            $this->executeHandler($handler);
        } else {
            $this->handleNotFound();
        }
    }

    private function handleCors()
    {
        // Allow requests from  any origin
        header('Access-Control-Allow-Origin: *');
        // Allow specified HTTP methods
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        // Allow specified HTTP headers
        header('Access-Control-Allow-Headers: Content-Type');
    }

    private function handleNotFound()
    {
        if ($this->notFoundHandler) {
            $this->executeHandler($this->notFoundHandler);
        } else {
            return json(false, 'Route not found', null, StatusCodeEnum::NOT_FOUND->value);
        }
    }

    private function executeHandler($handler)
    {
        if (is_callable($handler)) {
            $response = $handler();
            return json(true, 'Success', $response, StatusCodeEnum::OK->value);
        }
    }
}

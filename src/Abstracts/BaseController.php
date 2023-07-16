<?php

namespace Martian\Scandi\Abstracts;

use Martian\Scandi\Interfaces\ControllerInterface;

abstract class BaseController implements ControllerInterface
{
    public function success(string $message, array $data = [], int $statusCode = 200, bool $success = true)
    {
        return json($success, $message, $data, $statusCode);
    }

    public function error(string $message, array $data = [], int $statusCode = 400, bool $success = false)
    {
        return json($success, $message, $data, $statusCode);
    }
}
<?php

namespace Martian\Scandi\Interfaces;

interface ControllerInterface
{
    public function success(string $message, array $data = [], int $statusCode = 200, bool $success = true);

    public function error(string $message, array $data = [], int $statusCode = 400, bool $success = false);

    public function validate(array $data, array $rules);
}
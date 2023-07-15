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

    public function validate(array $data, array $rules)
    {
        // $validator = validator($data, $rules);

        // if ($validator->fails()) {
        //     $errors = $validator->errors()->toArray();

        //     $message = array_values($errors)[0][0];

        //     return $this->error(false, $message, $errors);
        // }

        // return true;
    }
}
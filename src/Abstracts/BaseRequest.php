<?php

namespace Martian\Scandi\Abstracts;

use Martian\Scandi\Enums\StatusCodeEnum;

class BaseRequest
{
    protected $requestData;

    protected $rules;

    public function __construct()
    {
        $this->requestData = array_merge($_GET, $_POST, $_FILES);
    }

    public function all()
    {
        return $this->requestData;
    }

    public function get($key, $default = null)
    {
        return $this->requestData[$key] ?? $default;
    }

    public function has($key)
    {
        return isset($this->requestData[$key]);
    }

    public function only($keys)
    {
        $data = [];

        foreach ($keys as $key) {
            $data[$key] = $this->get($key);
        }

        return $data;
    }

    public function except($keys)
    {
        $data = [];

        foreach ($this->requestData as $key => $value) {
            if (!in_array($key, $keys)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function validated()
    {
        $validator = validator($this->requestData, $this->rules);
        if (!$validator->validate()) {
            return json(false, 'Validation failed', $validator->errors(), StatusCodeEnum::BAD_REQUEST->value);
        } else {
            return $validator->validated();
        }
    }
}
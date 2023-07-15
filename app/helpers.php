<?php

use Martian\Scandi\Classes\Config;
use Martian\Scandi\Classes\Env;
use Martian\Scandi\Classes\Validator;

function env($key, $default = null)
{
    return Env::get($key, $default);
}

function config($key, $default = null)
{
    return Config::get($key, $default);
}

function json(bool $status, string $message, $data = null, $statusCode = 200)
{
    header('Content-Type: application/json');
    http_response_code($statusCode);
    $response = [
        'status' => $status ? 'success' : 'error',
        'message' => $message,
    ];
    if ($data) {
        $response['data'] = $data;
    }
    echo json_encode($response);
    exit;
}

function url($url, $params = [])
{
    $url = rtrim($url, '/');
    if (count($params)) {
        $url .= '?' . http_build_query($params);
    }
    return $url;
}

function validator(array $data, array $rules)
{
    return (new Validator($data, $rules));
}
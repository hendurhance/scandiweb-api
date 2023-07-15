<?php

namespace Martian\Scandi\Classes;

use Dotenv\Dotenv;

class Env
{
    /**
     * Get environment variable
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        $dotenv = Dotenv::createImmutable(__DIR__.'/../../');
        $dotenv->load();

        return $_ENV[$key] ?? $default;
    }
}
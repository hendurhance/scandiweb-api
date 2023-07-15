<?php

namespace Martian\Scandi\Classes;

class Config
{
    /**
     * Get configuration value 
     * 
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        $filename = explode('.', $key)[0];
        $key = explode('.', $key)[1];

        $config = require __DIR__.'/../../config/'.$filename.'.php';

        return $config[$key] ?? $default;
    }
}
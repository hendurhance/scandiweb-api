<?php

namespace Martian\Scandi\Classes;

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
        $envFilePath = __DIR__ . '/../../.env';

        if (file_exists($envFilePath)) {
            $envContent = file_get_contents($envFilePath);
            $envLines = explode("\n", $envContent);
            $envVariables = [];

            foreach ($envLines as $line) {
                $line = trim($line);

                // Skip empty lines and comments
                if ($line === '' || strpos($line, '#') === 0) {
                    continue;
                }

                $parts = explode('=', $line, 2);
                $envVariables[$parts[0]] = isset($parts[1]) ? $parts[1] : '';
            }
            
            return $envVariables[$key] ?? $default;
        }

        return $default;
    }
}

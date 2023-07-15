<?php

namespace Martian\Scandi\Interfaces;

interface RequestInterface
{
    public function all();

    public function get($key, $default = null);

    public function has($key);

    public function only($keys);

    public function except($keys);

    public function validated();

    public function rules();
}
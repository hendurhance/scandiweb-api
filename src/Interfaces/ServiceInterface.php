<?php

namespace Martian\Scandi\Interfaces;

interface ServiceInterface
{
    public function create($data);
    public function update($data);
    public function delete($data);
    public function get($data);
    public function all();
}
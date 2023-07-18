<?php

namespace Martian\Scandi\Interfaces;

interface RepositoryInterface
{
    public function create($data);
    public function update($data);
    public function delete($data);
    public function get($data);
    public function all();
}
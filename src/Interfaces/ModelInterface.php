<?php

namespace Martian\Scandi\Interfaces;

interface ModelInterface
{
    public function all();

    public function find($id);

    public function create($data);

    public function update($id, $data);

    public function delete(array $ids);
}
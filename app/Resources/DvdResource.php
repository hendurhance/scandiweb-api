<?php

namespace App\Resources;

use Martian\Scandi\Interfaces\ResourceInterface;

class DvdResource implements ResourceInterface
{
    public function toArray($data)
    {
        return [
            'id' => $data['id'],
            'sku' => $data['sku'],
            'name' => $data['name'],
            'price' => $data['price'],
            'type' => $data['type'],
            'size' => $data['size']
        ];
    }
}
<?php

namespace App\Resources;

use Martian\Scandi\Interfaces\ResourceInterface;

class FurnitureResource implements ResourceInterface
{
    public function toArray($data)
    {
        return [
            'sku' => $data['sku'],
            'name' => $data['name'],
            'price' => $data['price'],
            'type' => $data['type'],
            'height' => $data['height'],
            'width' => $data['width'],
            'length' => $data['length']
        ];
    }
}
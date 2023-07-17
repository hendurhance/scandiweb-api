<?php

namespace App\Factories;

use App\Enum\ProductTypeEnum;
use App\Models\Product;

class FurnitureFactory implements ProductFactoryInterface
{
    public function create($data)
    {
        $product = new Product();

        $product->create([
            'sku' => $data['sku'],
            'name' => $data['name'],
            'price' => $data['price'],
            'type' => ProductTypeEnum::FURNITURE->value,
            'height' => $data['height'],
            'width' => $data['width'],
            'length' => $data['length']
        ]);

        return $product;
    }
}
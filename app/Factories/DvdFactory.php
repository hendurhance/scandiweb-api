<?php

namespace App\Factories;

use App\Enum\ProductTypeEnum;
use App\Models\Product;

class DvdFactory implements ProductFactoryInterface
{
    public function create($data)
    {
        $product = new Product();

        $product->create([
            'sku' => $data['sku'],
            'name' => $data['name'],
            'price' => $data['price'],
            'type' => ProductTypeEnum::DVD->value,
            'size' => $data['size']
        ]);

        return $product;
    }
}
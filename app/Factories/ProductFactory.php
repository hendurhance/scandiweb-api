<?php

namespace App\Factories;

use App\Models\Product;
use Martian\Scandi\Enums\StatusCodeEnum;

class ProductFactory
{
    protected $productType;

    public function __construct()
    {
        $this->productType = [
            'book' => BookFactory::class,
            'dvd' => DvdFactory::class,
            'furniture' => FurnitureFactory::class
        ];
    }

    public function create($data)
    {
        $product = (new Product())->where('sku', $data['sku']);
        if ($product) {
            return json(false, 'Product with this SKU already exists', null, StatusCodeEnum::BAD_REQUEST->value);
        }

        $productType = $this->productType[$data['type']];

        return (new $productType())->create($data);
    }
}
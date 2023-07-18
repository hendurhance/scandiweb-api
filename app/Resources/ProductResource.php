<?php

namespace App\Resources;

class ProductResource
{
    protected $productType;

    public function __construct()
    {
        $this->productType = [
            'book' => BookResource::class,
            'dvd' => DvdResource::class,
            'furniture' => FurnitureResource::class
        ];
    }

    public function toArray($data)
    {
        $productType = $this->productType[$data['type']];

        return (new $productType())->toArray($data);
    }

    public function collection($data)
    {
        $products = [];
        foreach ($data as $product) {
            $products[] = $this->toArray($product);
        }

        return $products;
    }
}
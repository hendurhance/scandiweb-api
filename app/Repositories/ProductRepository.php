<?php

namespace App\Repositories;

use App\Factories\ProductFactory;
use App\Models\Product;
use App\Resources\ProductResource;
use Martian\Scandi\Interfaces\RepositoryInterface;

class ProductRepository implements RepositoryInterface
{
    public function create($data)
    {
        (new ProductFactory())->create($data);
    }

    public function update($data)
    {}

    public function delete($data)
    {
        (new Product())->deleteByColumn('sku', $data['sku']);
    }

    public function get($data)
    {}
    
    public function all()
    {
        $products = (new Product())->all();
        return (new ProductResource())->collection($products);
    }
}
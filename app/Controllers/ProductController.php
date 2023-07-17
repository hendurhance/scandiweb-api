<?php

namespace App\Controllers;

use App\Enum\ProductTypeEnum;
use App\Factories\ProductFactory;
use App\Models\Product;
use App\Requests\CreateProductRequest;
use App\Requests\DeleteProductRequest;
use Martian\Scandi\Abstracts\BaseController;

class ProductController extends BaseController
{
    public function index()
    {
        $products = (new Product())->all();
        return $this->success('Products retrieved successfully', $products);
    }

    public function store()
    {
        $requests = (new CreateProductRequest())->validated();
        (new ProductFactory())->create($requests);
        return $this->success('Product created successfully');
    }

    public function destroy()
    {
        $requests = (new DeleteProductRequest())->validated();
        return $this->success('Product deleted successfully', $requests);
    }
}
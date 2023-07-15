<?php

namespace App\Controllers;

use App\Enum\ProductTypeEnum;
use App\Models\Product;
use App\Requests\CreateProductRequest;
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
        return $this->success('Product created successfully', $requests);
    }
}
<?php

namespace App\Controllers;

use App\Models\Product;
use Martian\Scandi\Abstracts\BaseController;

class ProductController extends BaseController
{
    public function index()
    {
        $products = (new Product())->all();
        return $this->success('Products retrieved successfully', $products);
    }
}
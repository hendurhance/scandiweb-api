<?php

namespace App\Controllers;

use App\Services\ProductService;
use App\Requests\CreateProductRequest;
use App\Requests\DeleteProductRequest;
use Martian\Scandi\Abstracts\BaseController;

class ProductController extends BaseController
{
    protected $service;

    public function __construct()
    {
        $this->service = new ProductService();
    }

    public function index()
    {
        return $this->success('Products retrieved successfully', $this->service->all());
    }

    public function store()
    {
        $requests = (new CreateProductRequest())->validated();
        $this->service->create($requests);
        return $this->success('Product created successfully');
    }

    public function destroy()
    {
        $requests = (new DeleteProductRequest())->validated();
        $this->service->delete($requests);
        return $this->success('Product deleted successfully');
    }
}
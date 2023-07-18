<?php

namespace App\Controllers;

use App\Enum\ProductTypeEnum;
use App\Factories\ProductFactory;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Requests\CreateProductRequest;
use App\Requests\DeleteProductRequest;
use App\Resources\ProductResource;
use Martian\Scandi\Abstracts\BaseController;

class ProductController extends BaseController
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    public function index()
    {
        return $this->success('Products retrieved successfully', $this->repository->all());
    }

    public function store()
    {
        $requests = (new CreateProductRequest())->validated();
        $this->repository->create($requests);
        return $this->success('Product created successfully');
    }

    public function destroy()
    {
        $requests = (new DeleteProductRequest())->validated();
        $this->repository->delete($requests);
        return $this->success('Product deleted successfully');
    }
}
<?php

namespace App\Controllers;

class ProductController
{
    public function index()
    {
        echo config('app.name');
    }
}
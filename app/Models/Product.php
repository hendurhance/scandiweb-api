<?php

namespace App\Models;

use Martian\Scandi\Abstracts\BaseModel;

class Product extends BaseModel
{
    protected $table = 'products';

    protected $fillable = [
        'id',
        'sku',
        'name',
        'price',
        'type',
        'size',
        'height',
        'width',
        'length',
        'weight'
    ];
}
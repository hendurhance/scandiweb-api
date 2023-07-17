<?php

namespace App\Requests;

use App\Enum\ProductTypeEnum;
use Martian\Scandi\Abstracts\BaseRequest;

class CreateProductRequest extends BaseRequest
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->rules = $this->rules();
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'sku' => 'required|max:255',
            'price' => 'required|numeric|min:1',
            'type' => 'required|' . ProductTypeEnum::getRules(),
            'size' => 'required_if:type,' . ProductTypeEnum::DVD->value . '|numeric|max:255',
            'weight' => 'required_if:type,' . ProductTypeEnum::BOOK->value . '|numeric|min:1',
            'height' => 'required_if:type,' . ProductTypeEnum::FURNITURE->value . '|numeric|min:1',
            'width' => 'required_if:type,' . ProductTypeEnum::FURNITURE->value . '|numeric|min:1',
            'length' => 'required_if:type,' . ProductTypeEnum::FURNITURE->value . '|numeric|min:1',
        ];
    }
}
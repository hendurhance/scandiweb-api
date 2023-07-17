<?php

namespace App\Requests;

use Martian\Scandi\Abstracts\BaseRequest;

class DeleteProductRequest extends BaseRequest
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
            'sku' => 'required'
        ];
    }
}
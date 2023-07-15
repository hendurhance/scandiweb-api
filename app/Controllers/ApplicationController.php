<?php

namespace App\Controllers;

use Martian\Scandi\Abstracts\BaseController;

class ApplicationController extends BaseController
{
    public function index()
    {
        return $this->success('Welcome to Scandi API', [
            'name' => config('app.name'),
            'version' => config('app.version')
        ]);
    }
}
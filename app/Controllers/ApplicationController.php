<?php

namespace App\Controllers;

class ApplicationController
{
    public function index()
    {
        return json(true, 'Welcome to Scandi API', [
            'name' => config('app.name'),
            'version' => config('app.version')
        ]);
    }
}
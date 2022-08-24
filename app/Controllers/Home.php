<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'WebGIS | Beranda'
        ];
        return view('Home', $data);
    }
}

<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function About()
    {
        $data = [
            'title' => 'WebGIS | About'
        ];
        return view('about', $data);
    }

    public function Contact()
    {
        $data = [
            'title' => 'WebGIS | Contact Us'
        ];
        return view('kontak', $data);
    }

    public function Peta()
    {
        $data = [
            'title' => 'WebGIS | Peta'
        ];
        return view('peta_leaflet', $data);
    }

    public function Filter()
    {
        $data = [
            'title' => 'Peta | Filter Peta'
        ];
        return view('filterpeta', $data);
    }

    public function Rute()
    {
        $data = [
            'title' => 'Peta | Rute '
        ];
        return view('rute', $data);
    }
}

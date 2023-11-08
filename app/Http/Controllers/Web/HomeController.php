<?php

namespace App\Http\Controllers\Web;

class HomeController
{
    public function index()
    {
        echo view('web.home');
    }
}
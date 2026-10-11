<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('pages/home', ['title' => 'POS System']);
    }

    public function about()
    {
        return view('pages/about', ['title' => 'About']);
    }
}
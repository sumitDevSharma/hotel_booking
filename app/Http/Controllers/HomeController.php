<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->theme = template();
    }

    public function index()
    {
        
        return view($this->theme . 'home');
    }
}

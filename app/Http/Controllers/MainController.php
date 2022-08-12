<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('./myFirstTest/home');
    }

    public function about()
    {
        return view('./myFirstTest/about');
    }

    public function review()
    {
        return view('./myFirstTest/review');
    }
}

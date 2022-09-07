<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class MainController extends Controller
{
    public function mainPage()
    {
        return view('main');
    }

    public function index()
    {
        return view('admin');
    }

}

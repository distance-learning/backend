<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function getDocAction()
    {
        return view('doc');
    }

    public function indexAction()
    {
        return view('index');
    }
}

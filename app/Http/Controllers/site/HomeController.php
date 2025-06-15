<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    private $view = 'pages.';
    public function index()
    {
        return view($this->view . 'index');
    }
    public function about()
    {
        // dd('i am here');
        return view('pages.about');
    }
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
    
}

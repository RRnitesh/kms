<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $view;

    public function __construct() 
    {
        $this->view = 'Admin.Pages.DashBoard.';
    }

    public function index()
    {
        return view($this->view . 'index');
    }


}

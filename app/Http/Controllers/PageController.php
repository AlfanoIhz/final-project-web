<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        // Return the view for the homepage
        return view('dashboard');
    }

    public function login()
    {
        // Return the view for the homepage
        return view('admin/login-page');
    }
}

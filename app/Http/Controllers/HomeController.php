<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     *To show landing page of the web application
     *
     * @return view
     */
    public function showLandingPage()
    {
        return view('welcome');
    }
}

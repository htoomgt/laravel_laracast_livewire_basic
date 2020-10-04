<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchDropdownController extends Controller
{
    public function showSearchDropdownPage()
    {
        return view('dropdown.page');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PollController extends Controller
{
    public function showPollExamplePage()
    {
        return view('poll.poll_page');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUserList()
    {
        $users = User::paginate(10);


        return view('user.user_list', compact('users'));
    }
}

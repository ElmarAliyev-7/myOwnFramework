<?php

namespace App\Http\Controllers\Web;

use App\Models\User;

class UserController
{
    public function index()
    {
        $users = User::all();
        return view('web.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('web.users.create');
    }
}
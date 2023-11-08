<?php

namespace App\Http\Controllers\Web;

use Core\DB;

class UserController
{
    public function index()
    {
        $users = DB::table('users')->all();
        return view('web.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('web.users.create');
    }
}
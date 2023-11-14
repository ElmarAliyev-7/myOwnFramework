<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Core\DB;

class UserController
{
    public function index()
    {
//        $users = User::all();
        $instance = new DB;
        return $users = $instance->table("users")->all();

        return view('web.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('web.users.create');
    }
}
<?php

namespace App\Http\Controllers\Web;

use Core\DB;

class UserController
{
    public function index()
    {
        $users = DB::table('users')->get();
        print_R($users);
    }

    public function create()
    {
        echo 'create user';
    }
}
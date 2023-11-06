<?php

namespace App\Http\Controllers\Web;

use Core\DB;

class UserController
{
    public function index()
    {
        $db = new DB;
        return $db;
    }

    public function create()
    {
        echo 'create user';
    }
}
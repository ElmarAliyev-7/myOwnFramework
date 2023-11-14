<?php

namespace App\Models;

use Core\DB;

class User extends Model
{
    private static string $table = "users";
    public static function all(): false|array
    {
        $db = new DB();
        return $db->table(self::$table)->all();
    }
}
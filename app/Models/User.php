<?php

namespace App\Models;

use Core\DB;

class User extends Model
{
    private static string $table = "users";
    public static function all(): false|array
    {
        return DB::table(self::$table)->all();
    }
}
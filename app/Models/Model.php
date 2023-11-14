<?php

namespace App\Models;

abstract class Model
{
    public abstract static function all(): false|array;
}
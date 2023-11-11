<?php

use Core\Route;

//autoload
require_once 'vendor/autoload.php';
//run routes
require_once 'routes/web.php';
Route::dispatch();

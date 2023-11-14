<?php

use Core\Route;

//autoload
require_once 'vendor/autoload.php';
//config files
require_once 'config/database.php';
//run routes
require_once 'routes/web.php';
Route::dispatch();

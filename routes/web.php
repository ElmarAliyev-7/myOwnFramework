<?php

use Core\Route;
use App\Http\Controllers\Web\{HomeController};

Route::get('/', [HomeController::class, 'index']);
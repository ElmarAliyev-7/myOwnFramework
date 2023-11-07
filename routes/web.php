<?php

use Core\Route;
use App\Http\Controllers\Web\{HomeController, UserController};

Route::get('/', [HomeController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
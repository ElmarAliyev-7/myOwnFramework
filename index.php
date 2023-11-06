<?php

require_once 'vendor/autoload.php';

use Core\Route;

print_r($_SERVER);

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
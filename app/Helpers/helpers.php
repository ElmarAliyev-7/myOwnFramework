<?php

use Core\View;

function view(string $filePath, ?array $vars)
{
    return View::render($filePath, $vars);
}
<?php

use Core\View;

function view(string $filePath, ?array $vars = null)
{
    return View::render($filePath, $vars);
}
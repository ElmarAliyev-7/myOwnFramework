<?php

use Core\View;

function view(string $filePath, ?array $vars = null): void
{
    View::render($filePath, $vars);
}
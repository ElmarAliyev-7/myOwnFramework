<?php

namespace Core;

class View
{
    public static function render(string $filePath, ?array $vars): void
    {
        ob_start();
        $filePath = str_replace(".", "/", $filePath);
        if($vars) extract($vars);
        require_once('resources/view/' . $filePath . '.php');
        ob_get_status();
    }
}
<?php

namespace Core;

class View
{
    public static function render(string $filePath, ?array $vars)
    {
        $filePath = str_replace(".", "/", $filePath);
        extract($vars);
        return require_once('resources/view/' . $filePath . '.php');
    }
}
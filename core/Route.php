<?php

namespace Core;

class Route
{
    public static function get(string $uri, array $controllerMethod)
    {
        if($_SERVER['REQUEST_URI'] === $uri || $_SERVER['REQUEST_URI'] === $uri . '/') {
            $controller = $controllerMethod[0];
            $method = $controllerMethod[1];
            $newController = new $controller;
            return $newController->$method();
        }
       return header("http://127.0.0.1:8000/404", true, 404);
    }

    public static function post()
    {

    }
}
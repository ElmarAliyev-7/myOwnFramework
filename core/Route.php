<?php

namespace Core;

use Exception;

class Route
{
    private static array $routes;
    public static function get(string $uri, array $controllerMethod)
    {
        try {
            $controller = $controllerMethod[0];
            $method = $controllerMethod[1];

            self::$routes['GET'][$uri] = ['controller' => $controller, 'method' => $method];

            if(self::checkUri('GET', $uri, $controllerMethod) === 1) {
                $newController = new $controller;
                return $newController->$method();
            } else {
                return self::redirectNotFound();
            }
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function post(string $uri, array $controllerMethod)
    {
        try {
            $controller = $controllerMethod[0];
            $method = $controllerMethod[1];

            self::$routes['POST'][$uri] = ['controller' => $controller, 'method' => $method];

            if(self::checkUri('POST', $uri, $controllerMethod) === 1) {
                $newController = new $controller;
                return $newController->$method();
            } else {
                return self::redirectNotFound();
            }
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    private static function redirectNotFound()
    {
        return header("http://127.0.0.1:8000/404", true, 404);
    }

    private static function checkUri(string $method, string $uri, array $controllerMethod)
    {
        //Check Route exists
        $checkKey = array_key_exists($uri, self::$routes[$method]);
        if(!$checkKey) return self::redirectNotFound();

        if($_SERVER['REQUEST_METHOD'] === $method
            and ($_SERVER['REQUEST_URI'] === $uri or $_SERVER['REQUEST_URI'] === $uri . '/')) {
            return 1;
        }
        //Check Class exists
        if(!class_exists($controllerMethod[0])) return self::redirectNotFound();
    }
}
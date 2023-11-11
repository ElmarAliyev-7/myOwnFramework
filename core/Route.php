<?php

namespace Core;

use Exception;

class Route
{
    private static array $routes;

    public static function get(string $uri, array $controllerMethod): void
    {
        self::$routes['GET'][$uri] = ['controller' => $controllerMethod[0], 'method' => $controllerMethod[1]];
    }

    public static function post(string $uri, array $controllerMethod): void
    {
        self::$routes['POST'][$uri] = ['controller' => $controllerMethod[0], 'method' => $controllerMethod[1]];
    }

    private static function getRequestUri(): string
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        if($requestUri !== '/' and str_ends_with($requestUri, '/')) $requestUri = substr($requestUri,0, -1);
        return $requestUri;
    }

    private static function getRequestMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    private static function redirectNotFound()
    {
        return header("http://127.0.0.1:8000/404", true, 404);
    }

    public static function dispatch()
    {
        try {
            $params = [];
            foreach(self::$routes as $requestMethod => $route) {
                //Check route exists
                if(!array_key_exists(self::getRequestUri(), self::$routes[$requestMethod])) return self::redirectNotFound();

                $controllerPath = self::$routes[$requestMethod][self::getRequestUri()]['controller'];
                $method = self::$routes[$requestMethod][self::getRequestUri()]['method'];

                if(!class_exists($controllerPath)) return self::redirectNotFound(); //Check Class exists

                if($requestMethod === self::getRequestMethod() and
                    in_array(self::getRequestUri(), array_keys(self::$routes[$requestMethod]))) {
                        $controller = new $controllerPath;
                        return print_r(call_user_func_array([$controller, $method], $params));
                }
            }
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}
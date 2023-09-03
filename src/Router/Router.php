<?php

namespace Src\Router;

class Router
{
    public static function get(string $uri, callable $action)
    {
        $requestURI = self::formatStringToArrayURI($_SERVER['REQUEST_URI']);
        $route = self::formatStringToArrayURI($uri);
        
        if (count($requestURI) === count($route)) {
            $isRoute = false;

            if ($uri === '' && count($requestURI) === 0) {
                $isRoute = true;
            } else {
                for ($i = 0; $i < count($route); $i++) {
                    $isRoute = $route[$i] === $requestURI[$i] ? true : false;
                }
            }
            
            if ($isRoute) {
                $f = new \ReflectionFunction($action);
                $f->invoke();
            } 
        }
    }

    private static function formatStringToArrayURI(string $string): array
    {
        $array = array_filter(
            explode('/', $string)
        );

        sort($array);
        return $array;
    }
}
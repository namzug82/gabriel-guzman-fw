<?php
namespace Fw\Component\Routing;

final class Router 
{
    private $route;
    // private $routeName;
    // private $subRoute;

    public function __construct(GenericParser $parsedRoute)
    {
        $this->route = $parsedRoute->parseRoutes();
        // $this->routeName = $this->getRouteName();
        // $this->subRouteName = $this->getSubRouteName($this->routeName);
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getRouteNameIfMatchPath($path)
    {
        $route = $this->getRoute();
        foreach ($route as $key => $value) {
            if (in_array(/*$this->getServerUrl()*/$path, $value)) {
                return $key;
            } 
        }
    }

    public function getSubRouteName($path)
    {
        $route = $this->getRoute();
        foreach ($route as $key => $value) {
            if ($key == $this->getRouteNameIfMatchPath($path)) {
                $subRoute = $value;
                return $subRoute;
            }
        }
    }

    // public function getServerUrl()
    // {
    //     if ($_SERVER['REQUEST_URI'] == "/") {
    //         return $_SERVER['REQUEST_URI'];
    //     } 
    //     else {
    //         return substr($_SERVER['PATH_INFO'], 1);
    //     }
    // } 

    // public function match($path)
    // {
    //     $router = $this->getRouter();
    //     $method = strtolower($path);
    //     if (!isset($router->routes[$method])) {
    //         return false;
    //     }
    //     $path = $request->getPath();
    //     foreach ($router->routes[$method] as $pattern => $handler) {
    //         if ($pattern === $path) {
    //             return $handler;
    //         }
    //     }
    // }

    //public function getController($subRoute)
    //{
    //    foreach ($subRoute as $key => $value) {
    //        if ($key == "controller") {
    //            return $value;
    //        } 
    //    }
    //} 
}

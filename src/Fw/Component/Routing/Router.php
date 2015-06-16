<?php
namespace Fw\Component\Routing;

final class Router 
{
    private $route;
    private $routeName;
    private $routePath;
    private $allowed_methods;

    public function __construct(GenericParser $parsedRoute)
    {
        $this->route = $parsedRoute->parseRoutes();
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getRouteName()
    {
        $route = $this->getRoute();
        foreach ($route as $key => $value) {
            if (in_array($this->getServerUrl(), $value)) {
                return $key;
            } 
        }
    }

    public function getSubRouteName($routeName)
    {
        $route = $this->getRoute();
        foreach ($route as $key => $value) {
            if ($key == $routeName) {
                var_dump($value);
                return $value;
            }
        }
    }

    public function getRoutePath()
    {
        $route = $this->getRoute();
        foreach ($route as $key => $value) {
            foreach ($value as $key2 => $value2) {
                if ($key2 == "path") {
                    return $value2;
                } 
            }
        }
    }

    public function getServerUrl()
    {
        if ($_SERVER['REQUEST_URI'] == "/") {
            return $_SERVER['REQUEST_URI'];
        } 
        else {
            return substr($_SERVER['PATH_INFO'], 1);
        }
    }   
}

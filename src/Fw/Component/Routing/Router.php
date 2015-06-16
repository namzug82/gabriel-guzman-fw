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
                return $value;
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

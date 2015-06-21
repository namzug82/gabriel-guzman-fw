<?php
namespace Fw\Component\Routing;

final class Router 
{
    private $route;

    public function __construct(GenericParser $parsedRoute)
    {
        $this->route = $parsedRoute->parseRoutes();
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getRouteNameIfMatchPath($path)
    {
        $route = $this->getRoute();
        foreach ($route as $key => $value) {
            if (in_array($path, $value)) {
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
}

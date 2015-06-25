<?php
namespace Fw\Component\Routing;

final class Router 
{
    private $route;

    public function __construct(GenericParser $parsedRoute)
    {
        $this->route = $parsedRoute->parseRoutes();
    }

    public function getRouteNameIfMatchPath($path)
    {
        foreach ($this->route as $key => $value) {
            if (in_array($path, $value)) {
                return $key;
            } 
        }
    }

    public function getSubRouteName($path, $requestMethods)
    {
        foreach ($this->route as $key => $value) {
            if ($key == $this->getRouteNameIfMatchPath($path)) {
                $controllerSubRoute = $value;
                if ($this->checkIfMethodIsAllowed($controllerSubRoute, $requestMethods)) {
                    return $controllerSubRoute;    
                } else {
                    throw new \Exception("Error: This method is not allowed in controller.");
                }
            }
        }
        throw new \Exception("Error: This request doesn't have an associated controller.");
    }

    public function checkIfMethodIsAllowed($controllerSubRoute, $requestMethods)
    {
        foreach ($controllerSubRoute as $keyAllowedMethod => $allowedMethods) {
            if ($keyAllowedMethod == "allowed_methods") {
                foreach ($requestMethods as $key => $value) {
                    if (in_array($key, $allowedMethods)) {
                        return true;
                    }
                }
            } 
        }
    }
}

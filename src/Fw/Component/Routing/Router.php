<?php
namespace Fw\Component\Routing;

final class Router 
{
    private $route;

    public function __construct(GenericParser $parsedRoute)
    {
        $this->route = $parsedRoute->parseRoutes();
    }

    public function getRouteNameIfMatchPath($path, $requestMethods)
    {
        foreach ($this->route as $key => $controllerSubRoute) {
            if (in_array($path, $controllerSubRoute) || $this->matchPattern($path, $controllerSubRoute)) {
                if ($this->checkIfMethodIsAllowed($controllerSubRoute, $requestMethods)) {
                    return $controllerSubRoute;    
                } else {
                    throw new \Exception("Error: This method is not allowed in controller.");
                }
            } 
        }
    }

    public function matchPattern($pathOfTheRequest, $arrayOfRoutingConfig)
    {
        $pattern = preg_replace('(\{(.*?)\})', '(\w+)', $arrayOfRoutingConfig['path']);
        $pattern = str_replace("/","\\/",$pattern);

        if (preg_match_all("/^" . $pattern . "$/", $pathOfTheRequest, $matches) > 0) {
            return true;
        }  
    }

    public function checkIfMethodIsAllowed($controllerSubRoute, $requestMethods)
    {
        foreach ($requestMethods as $key => $value) {
            if (in_array($key, $controllerSubRoute["allowed_methods"])) {
                return true;
            }
        }       
    }
}

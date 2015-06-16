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
        $this->routeName = $this->getRouteName($this->route);
        $this->routePath = $this->getRoutePath($this->route);
    }

    public function getRouteName($route)
    {
        foreach ($route as $key => $value) {
            if (in_array($this->getServerUrl(), $value)) {
                return($key);
            } 
        }
    }

    public function getRoutePath($route)
    {
        foreach ($route as $key => $value) {
            foreach ($value as $key2 => $value2) {
                if ($key2 == "path") {
                    return($value2);
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

// array(3) { 
//     ["home"]=> 
//     array(2) { 
//         ["path"]=> string(1) "/" 
//         ["allowed_methods"]=> array(1) { 
//             [0]=> string(3) "get" 
//         } 
//     }

//     ["some-page"]=> 
//     array(2) { 
//         ["path"]=> string(9) "some-page" 
//         ["allowed_methods"]=> array(1) { 
//             [0]=> string(3) "get" 
//         } 
//     }

//     ["some-{variable}-page"]=> 
//     array(2) { 
//         ["path"]=> string(20) "some/{variable}/page" 
//         ["allowed_methods"]=> array(1) { 
//             [0]=> string(3) "get" 
//         } 
//     } 
// }
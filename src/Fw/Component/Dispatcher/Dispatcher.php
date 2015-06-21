<?php
namespace Fw\Component\Dispatcher;

final class Dispatcher 
{   
    //private $router;

    // public function __construct(Router $router)
    // {
    //     $this->router = $router;
    // }

    public function getController($requestSubRoute)
    {
        // $router = $this->getRouter();
        // $controller = $this->match($request);
        if (! $requestSubRoute) {
            echo "Could not find your resource! \n";
            return false;
        } else {
            foreach ($subRoute as $key => $value) {
                if ($key == "controller") {
                    $controller = $value . "Controller";
                    return $controller;
                } 
            }    
        }
    }

    // public function getRouter()
    // {
    //     return $this->router;
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

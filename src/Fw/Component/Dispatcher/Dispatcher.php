<?php
namespace Fw\Component\Dispatcher;

final class Dispatcher 
{   
    public function getController($requestSubRoute)
    {
        // $router = $this->getRouter();
        // $controller = $this->match($request);
        if (! $requestSubRoute) {
            echo "Could not find your resource! \n";
            return false;
        } else {
            foreach ($requestSubRoute as $key => $value) {
                if ($key == "controller") {
                    $controller = $value . "Controller";
                    return $controller;
                } 
            }    
        }
    }
}

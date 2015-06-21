<?php
namespace Fw\Component\Dispatcher;

final class Dispatcher 
{   
    public function getController($requestSubRoute)
    {
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

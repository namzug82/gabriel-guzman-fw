<?php
namespace Fw\Component\Dispatcher;

use Fw\Component\Request\Request;

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
                    $this->controller = $value . "Controller";
                } 
            }    
        }
        return $this->controller;
    }
}

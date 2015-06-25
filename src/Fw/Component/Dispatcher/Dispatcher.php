<?php
namespace Fw\Component\Dispatcher;

use Fw\Component\Request\Request;

final class Dispatcher 
{   
    public function getController($requestSubRoute)
    {
        if (! $requestSubRoute) {
            throw new \Exception("Error: Could not find your resource!");       
        } else {
            foreach ($requestSubRoute as $key => $value) {
                if ($key == "controller") {
                    return $value . "Controller";
                } 
            }    
        }
    }
}

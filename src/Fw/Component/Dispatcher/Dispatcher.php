<?php
namespace Fw\Component\Dispatcher;

final class Dispatcher 
{    
    public function getController($subRoute)
    {
        foreach ($subRoute as $key => $value) {
            if ($key == "controller") {
                return($value);
            } 
        }
    }
}

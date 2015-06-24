<?php
namespace Fw\Component\Dispatcher;

use Fw\Component\Request\Request;

final class Dispatcher 
{   
    private $controller;

    public function __construct(Request $request)
    {
        $requestSubRoute = $request->getPath();

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
    }

    public function getController()
    {
        return $this->controller;
    }
}

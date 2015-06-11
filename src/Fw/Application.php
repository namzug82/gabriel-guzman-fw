<?php

namespace Fw;

use Fw\Component\Routing;

final class Application
{
    public function setRouting(Routing $routing_component)
    {
        echo $routing_component;
    }

    public function run()
    {
        echo "instanciación del framework, front controller \n";
    }
}


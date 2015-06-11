<?php

namespace Fw\Component\Routing;

final class GenericParser
{   
    private $route;

    public function __construct(Routing $route)
    {
        $this->route = $route;
    }

    public function parseRoutes()
    {
        return $this->route->parseRoutes();
    }
}
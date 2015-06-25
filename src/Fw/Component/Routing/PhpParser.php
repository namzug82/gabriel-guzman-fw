<?php
namespace Fw\Component\Routing;

final class PhpParser implements Routing
{   
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function parseRoutes()
    {
        return include $this->path;
    }
}

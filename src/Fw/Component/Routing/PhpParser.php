<?php
namespace Fw\Component\Routing;

final class PhpParser implements Routing
{   
    private $path;

    public function __construct($path)
    {
        $this->path = __DIR__ . $path;
    }

    public function parseRoutes()
    {
        return include $this->path;
    }
}

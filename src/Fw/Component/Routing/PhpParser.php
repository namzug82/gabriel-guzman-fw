<?php
namespace Fw\Component\Routing;

final class PhpParser implements Routing
{   
    private $parser;
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function parseRoutes()
    {
        return file_get_contents($this->path);
    }
}

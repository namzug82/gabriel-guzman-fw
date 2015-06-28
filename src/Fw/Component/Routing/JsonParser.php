<?php
namespace Fw\Component\Routing;

final class JsonParser implements Routing
{   
    private $path;

    public function __construct($path)
    {
        $this->path = __DIR__ . $path;
    }

    public function parseRoutes()
    {
        return json_decode((file_get_contents($this->path)), true);
    }
}

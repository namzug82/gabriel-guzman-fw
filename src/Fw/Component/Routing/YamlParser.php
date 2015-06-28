<?php
namespace Fw\Component\Routing;

final class YamlParser implements Routing
{   
    private $parser;
    private $path;

    public function __construct($parser, $path)
    {
        $this->parser = $parser;
        $this->path = __DIR__ . $path;
    }

    public function parseRoutes()
    {
        return $this->parser->parse(file_get_contents($this->path));
    }
}

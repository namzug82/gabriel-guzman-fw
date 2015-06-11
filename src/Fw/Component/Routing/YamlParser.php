<?php

namespace Fw\Component\Routing\

use Symfony\Component\Yaml\Parser;

final class YamlParser implements Routing
{   
    private $yaml;

    public function __construct()
    {
        $this->yaml = new Parser();
        return $this->yaml->parse(file_get_contents('../App/Component/Routing/Yaml/routing.yml'));
    }
}
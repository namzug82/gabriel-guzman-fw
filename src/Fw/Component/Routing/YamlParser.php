<?php

namespace Fw\Component\Routing;

use Symfony\Component\Yaml\Parser;

final class YamlParser implements Routing
{   
    public function parseRoutes()
    {
        $yaml = new Parser();
        return $yaml->parse(file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/../src/App/Component/Routing/Yaml/routing.yml'));
    }
}

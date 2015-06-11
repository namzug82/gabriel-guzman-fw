<?php

namespace Fw\Component\Routing\

use Symfony\Component\Yaml\Parser;

$yaml = new Parser();

$value = $yaml->parse(file_get_contents('/Yaml/routing.yml'));
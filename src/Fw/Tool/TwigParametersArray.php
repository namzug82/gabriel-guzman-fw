<?php
namespace Fw\Tool;

final class TwigParametersArray implements ArrayConstructor
{
    private $array = [];

    public function __construct()
    {
        $this->array['domain'] = "http://" . $_SERVER['HTTP_HOST'] . "/";
    }

    public function getArray()
    {
        return $this->array;
    }

    public function setArray($key, $value)
    {
        $this->array[$key] = $value;
    }
}

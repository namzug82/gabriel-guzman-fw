<?php
namespace Fw\Component\Request;

class Request implements ArrayAccess 
{
    //private $container = array();
    private $method = array();
    private $path;

    public function __construct() {
        $this->method = array(
            "get"   => $_GET,
            "post"   => $_POST,
            "server" => $_SERVER,
        );
        $this->path = $this->getServerUrl();
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getServerUrl()
    {
        if ($_SERVER['REQUEST_URI'] == "/") {
            return $_SERVER['REQUEST_URI'];
        } 
        else {
            return substr($_SERVER['PATH_INFO'], 1);
        }
    } 

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}

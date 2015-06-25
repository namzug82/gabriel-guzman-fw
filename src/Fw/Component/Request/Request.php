<?php
namespace Fw\Component\Request;

class Request implements \ArrayAccess 
{
    private $method = array();
    private $path;

    public function __construct() 
    {
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $this->method = array( "post" => $_POST, "server" => $_SERVER);
        } else {
            $this->method = array( "get" => $_GET, "server" => $_SERVER);
        }

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
            $this->method[] = $value;
        } else {
            $this->method[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->method[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->method[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->method[$offset]) ? $this->method[$offset] : null;
    }
}

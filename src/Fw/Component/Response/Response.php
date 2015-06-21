<?php
namespace Fw\Component\Response;

class Response
{
    private $data;

    public function __construct($dataFromController) 
    {
        $this->data = $dataFromController;
    }

    public function getData()
    {
        return $this->data;
    }
}

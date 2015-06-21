<?php
namespace Fw\Component\Response;

class JsonResponse implements Response
{
    private $data;

    public function __construct($dataFromController) 
    {
        $this->data = json_encode($dataFromController);
    }

    public function getData()
    {
        return $this->data;
    }
}

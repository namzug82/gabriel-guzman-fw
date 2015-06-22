<?php
namespace Fw\Component\Response;

class JsonResponse implements Response
{
    private $data;

    public function __construct(Array $dataFromController) 
    {
        $this->data = $dataFromController;
    }

    public function getData()
    {
        return $this->data;
    }
}

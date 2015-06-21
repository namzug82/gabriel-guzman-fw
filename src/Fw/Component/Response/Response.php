<?php
namespace Fw\Component\Response;

interface Response
{
    private $data;

    public function __construct($dataFromController);

    public function getData();
}

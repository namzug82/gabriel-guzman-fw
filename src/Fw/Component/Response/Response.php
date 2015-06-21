<?php
namespace Fw\Component\Response;

interface Response
{
    public function __construct($dataFromController);
    public function getData();
}

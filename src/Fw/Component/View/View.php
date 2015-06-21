<?php
namespace Fw\Component\View;

use Fw\Component\Response\Response;

interface View 
{
    public function render(Response $response);
}

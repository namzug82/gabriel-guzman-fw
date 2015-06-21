<?php
namespace Fw\Component\Controller;

use Fw\Component\Request\Request;

interface Controller
{
    public function __invoke(Request $request);
}

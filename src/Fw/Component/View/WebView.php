<?php
namespace Fw\Component\View;

use Fw\Component\Response\Response;

interface WebView extends View
{
    public function render(Response $response);
}

<?php
namespace Fw\Component\View;

use Fw\Component\Response\Response;

class TwigView implements WebView
{
    public function render(Response $response)
    {
        echo $response->getData();
    }
}

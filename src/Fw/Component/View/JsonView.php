<?php
namespace Fw\Component\View;

use Fw\Component\Response\Response;

class JsonView implements View
{
    public function render(Response $response)
    {
        echo json_encode($response->getData());
    }
}

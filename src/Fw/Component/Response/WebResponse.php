<?php
namespace Fw\Component\Response;

class WebResponse implements Response
{
    private $parameters = array();
    private $templateName;

    public function __construct($templateName, $parameters) 
    {
        $this->templateName = $templateName;
        $this->parameters = array('items' => $parameters);
    }

    public function getTemplateName()
    {
        return $this->templateName;
    }

    public function getParameters()
    {
        return $this->parameters;
    }
}

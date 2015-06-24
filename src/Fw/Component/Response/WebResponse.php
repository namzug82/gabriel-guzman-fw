<?php
namespace Fw\Component\Response;

class WebResponse implements Response
{
    private $parameters;
    private $templateName;

    public function __construct($templateName, $parameters) 
    {
        $this->templateName = $templateName;
        $this->parameters = $parameters;
    }

    public function getTemplateName()
    {
        return $this->templateName;
    }

    public function getParamenter()
    {
        return $this->parameters;
    }
}

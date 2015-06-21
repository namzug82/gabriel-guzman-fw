<?php
namespace Fw\Component\View;

class TwigView implements WebView
{
    public function render($data)
    {
        echo $data;
    }
}
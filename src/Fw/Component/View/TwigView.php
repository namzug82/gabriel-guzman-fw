<?php
namespace Fw\Component\View;

use Fw\Component\Response\Response;

class TwigView implements WebView
{
    private $twig;

    public function __construct($templatesPath)
    {
        $loader = new \Twig_Loader_Filesystem( $templatesPath );
        $this->twig = new \Twig_Environment( $loader, ['debug' => true] );
    }

    public function render(Response $response)
    {
        // echo $response->getData();
        // // echo $this->twig->render('index.twig', ['tasks' => $tasks]);

        // echo $this->twig->render(array(
        //                     'name' => 'Clark Kent',
        //                     'username' => 'ckent',
        //                     'password' => 'krypt0n1te',
        //                   ));
        echo $this->twig->render($response->getTemplateName, $response->parameters);
    }
}

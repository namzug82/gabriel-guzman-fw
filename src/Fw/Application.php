<?php
namespace Fw;

use Fw\Component\Container\Container;
use Fw\Component\Controller\Controller;
use Fw\Component\Response\JsonResponse;
use Fw\Component\View\JsonView;

final class Application
{
    private $container;

    public function run()
    {
        try {
            $container = $this->container->getContainer();
            $request = $container->get('request');
            $router = $container->get('router');
            $dispatcher = $container->get('dispatcher');
            $requestPath = $request->getPath();
            $requestMethod = $request->getMethod();
            $requestSubRoute = $router->getSubRouteName($requestPath, $requestMethod);
            $controller = $dispatcher->getController($requestSubRoute);
            $invokeResponse = new $controller($this->container);
            $response = $invokeResponse($request);

            if ($response->getParameters() instanceof JsonResponse) {
                $view = new JsonView();
            } else {
                $view = $container->get('twig_view');
            }
            $view->render($response);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function setContainer(Container $container)
    {
        $this->container = $container;
    }
}

<?php
namespace Fw;

use Fw\Component\Routing\Router;
use Fw\Component\Dispatcher\Dispatcher;
use Fw\Component\Request\Request;
use Fw\Component\Response\JsonResponse;
use Fw\Component\Response\WebResponse;
use Fw\Component\Controller\Controller;

final class Application
{
    private $routerComponent;
    private $dispatcherComponent;
    private $requestComponent;
    private $responseComponent;
    private $viewComponent;
    private $databaseComponent;

    public function run()
    {
        $requestPath = $this->requestComponent->getPath();
        $requestSubRoute = $this->routerComponent->getSubRouteName($requestPath);
        $controller = $this->dispatcherComponent->getController($requestSubRoute);
        $invokeResponse = new $controller();
        $response = $invokeResponse($request);

        if ($response->getData() instanceof JsonResponse) {
            $view = new JsonView();
        } else {
            $view = new TwigView();
        }
        $view->render($response);
    }

    public function setRouter(Router $routerComponent)
    {
        $this->routerComponent = $routerComponent;
    }

    public function setRequest(Request $requestComponent)
    {
        $this->requestComponent = $requestComponent;
    }

    public function setDispatcher(Dispatcher $dispatcherComponent)
    {
        $this->dispatcherComponent = $dispatcherComponent;
    }
}


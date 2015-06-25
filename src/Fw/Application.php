<?php
namespace Fw;

use Fw\Component\Routing\Router;
use Fw\Component\Dispatcher\Dispatcher;
use Fw\Component\Request\Request;
use Fw\Component\Response\JsonResponse;
use Fw\Component\Response\WebResponse;
use Fw\Component\Controller\Controller;
use Fw\Component\View\WebView;
use Fw\Component\View\JsonView;
use Fw\Component\View\TwigView;

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
        $request = $this->requestComponent;
        $database = $this->databaseComponent;
        $requestPath = $this->requestComponent->getPath();
        $requestSubRoute = $this->routerComponent->getSubRouteName($requestPath);
        $controller = $this->dispatcherComponent->getController($requestSubRoute);
        $invokeResponse = new $controller($database);
        $response = $invokeResponse($request);

        if ($response->getParameters() instanceof JsonResponse) {
            $view = new JsonView();
        } else {
            $view = $this->viewComponent;
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

    public function setWebView(WebView $twig)
    {
        $this->viewComponent = $twig;
    }

    public function setDatabase(Database $database)
    {
        $this->databaseComponent = $database;
    }
}

<?php
namespace Fw;

use Fw\Component\Container\Container;
use Fw\Component\Response\JsonResponse;

final class Application
{
    private $container;

    public function run()
    {
        try {
            $container = $this->container->getContainer();
            $request = $container->get('request');
            $cache = $container->get('cache');
            $key = hash('sha1', $request->getPath());
            $response = $cache->get($key);
            if (false === $response) {
                $router = $container->get('router');
                $dispatcher = $container->get('dispatcher');
                $requestPath = $request->getPath();
                $requestMethod = $request->getMethod();
                $requestSubRoute = $router->getRouteNameIfMatchPath($requestPath, $requestMethod);
                $controller = $dispatcher->getController($requestSubRoute);
                $parameters = $dispatcher->getParameters($requestSubRoute, $requestPath);
                $invokeResponse = new $controller($this->container);
                $response = $invokeResponse($parameters);
                $cache->set($key, $response, 0, 300);
            }

            if ($response instanceof JsonResponse) {
                $view = $container->get('json_view');
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

<?php
namespace Fw\Component\Container;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class Container
{
    private $container;

    public function __construct($path)
    {
        $pathToServiceFile = pathinfo($path);

        $this->container = new ContainerBuilder();
        $loader =   new YamlFileLoader($this->container, 
                    new FileLocator($pathToServiceFile['dirname']));
        $loader->load($pathToServiceFile['basename']);
    }

    public function getContainer()
    {
        return $this->container;
    }
}

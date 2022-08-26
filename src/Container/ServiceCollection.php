<?php
namespace DependencyInjection\Container;

use DependencyInjection\Container\Interfaces\IServiceItemInterface;
use DependencyInjection\Container\Interfaces\IServiceCollectionInterface;

class ServiceCollection implements IServiceCollectionInterface
{
    /** @var IServiceItemInterface $collection */
    private $collection = [];

    /**
     * @param IServiceItemInterface $container
     * @return $this
     */
    public function push(IServiceItemInterface $container): self
    {
        $this->collection[$container->getSign()] = $container;
        return $this;
    }

    /**
     * @param string $containerId
     * @return IServiceItemInterface
     */
    public function findService(string $containerId): ?object
    {
        return $this->collection[$containerId];
    }

}
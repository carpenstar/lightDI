<?php
namespace DependencyInjection\ServiceManager\Abstracts;

use DependencyInjection\Config\Interfaces\IConfigInterface;
use DependencyInjection\Fabrics\IFabricAdditionalInterface;
use DependencyInjection\Container\Interfaces\IServiceCollectionInterface;
use DependencyInjection\Fabrics\ServiceManager\ServiceManagerConfigAdditional;
use DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;

abstract class ABaseServiceManager implements IServiceManagerInterface
{
    /** @var IConfigInterface $config */
    protected IConfigInterface $config;

    /** @var IServiceCollectionInterface $collectionContainer */
    protected IServiceCollectionInterface $collectionContainer;

    /** @param ServiceManagerConfigAdditional $additional */
    public function __construct(IFabricAdditionalInterface $additional)
    {
        $this->config = $additional->getConfig();
    }
}
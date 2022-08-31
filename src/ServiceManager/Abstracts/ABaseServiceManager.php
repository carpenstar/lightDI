<?php
namespace Carpenstar\DependencyInjection\ServiceManager\Abstracts;

use Carpenstar\DependencyInjection\Config\Interfaces\IConfigInterface;
use Carpenstar\DependencyInjection\Fabrics\IFabricAdditionalInterface;
use Carpenstar\DependencyInjection\Container\Interfaces\IServiceCollectionInterface;
use Carpenstar\DependencyInjection\Fabrics\ServiceManager\ServiceManagerConfigAdditional;
use Carpenstar\DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;

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
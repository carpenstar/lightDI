<?php
namespace Carpenstar\DependencyInjection\Fabrics\ServiceManager;

use Carpenstar\DependencyInjection\Fabrics\AFabric;
use Carpenstar\DependencyInjection\Fabrics\IFabricBuildParamInterface;
use Carpenstar\DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;

class ServiceManagerFabric extends AFabric
{
    public static function make(string $className, ?IFabricBuildParamInterface $additional = null): IServiceManagerInterface
    {
        /** @var ServiceManagerBuildParam $additional */
        return new $className($additional);
    }
}
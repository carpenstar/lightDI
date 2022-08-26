<?php
namespace DependencyInjection\Fabrics\ServiceManager;

use DependencyInjection\Fabrics\AFabric;
use DependencyInjection\Fabrics\IFabricAdditionalInterface;
use DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;

class ServiceManagerFabric extends AFabric
{
    public static function make(string $className, ?IFabricAdditionalInterface $additional = null): IServiceManagerInterface
    {
        /** @var ServiceManagerConfigAdditional $additional */
        return new $className($additional);
    }
}
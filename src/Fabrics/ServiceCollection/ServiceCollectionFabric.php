<?php
namespace DependencyInjection\Fabrics\ServiceCollection;

use DependencyInjection\Container\Interfaces\IServiceCollectionInterface;
use DependencyInjection\Fabrics\AFabric;
use DependencyInjection\Fabrics\IFabricAdditionalInterface;

class ServiceCollectionFabric extends AFabric
{
    public static function make(string $className,  ?IFabricAdditionalInterface $additional = null): IServiceCollectionInterface
    {
        return new $className();
    }
}
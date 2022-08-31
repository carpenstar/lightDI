<?php
namespace Carpenstar\DependencyInjection\Fabrics\ServiceCollection;

use Carpenstar\DependencyInjection\Container\Interfaces\IServiceCollectionInterface;
use Carpenstar\DependencyInjection\Fabrics\AFabric;
use Carpenstar\DependencyInjection\Fabrics\IFabricAdditionalInterface;

class ServiceCollectionFabric extends AFabric
{
    public static function make(string $className,  ?IFabricAdditionalInterface $additional = null): IServiceCollectionInterface
    {
        return new $className();
    }
}
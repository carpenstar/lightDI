<?php
namespace Carpenstar\DependencyInjection\Fabrics\ServiceCollection;

use Carpenstar\DependencyInjection\Container\Interfaces\IServiceCollectionInterface;
use Carpenstar\DependencyInjection\Fabrics\AFabric;
use Carpenstar\DependencyInjection\Fabrics\IFabricBuildParamInterface;

class ServiceCollectionFabric extends AFabric
{
    public static function make(string $className,  ?IFabricBuildParamInterface $additional = null): IServiceCollectionInterface
    {
        return new $className();
    }
}
<?php
namespace Carpenstar\DependencyInjection\Fabrics\ServiceItem;

use Carpenstar\DependencyInjection\Container\Interfaces\IServiceItemInterface;
use Carpenstar\DependencyInjection\Fabrics\AFabric;
use Carpenstar\DependencyInjection\Fabrics\IFabricBuildParamInterface;

class ServiceItemFabric extends AFabric
{
    public static function make(string $className,  ?IFabricBuildParamInterface $additional = null): IServiceItemInterface
    {
        return new $className($additional);
    }
}
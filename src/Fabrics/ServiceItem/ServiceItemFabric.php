<?php
namespace DependencyInjection\Fabrics\ServiceItem;

use DependencyInjection\Container\Interfaces\IServiceItemInterface;
use DependencyInjection\Fabrics\AFabric;
use DependencyInjection\Fabrics\IFabricAdditionalInterface;

class ServiceItemFabric extends AFabric
{
    public static function make(string $className,  ?IFabricAdditionalInterface $additional = null): IServiceItemInterface
    {
        return new $className($additional);
    }
}
<?php
namespace Carpenstar\DependencyInjection\Fabrics\ServiceManager;

use Carpenstar\DependencyInjection\Fabrics\AFabric;
use Carpenstar\DependencyInjection\Fabrics\IFabricAdditionalInterface;
use Carpenstar\DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;

class ServiceManagerFabric extends AFabric
{
    public static function make(string $className, ?IFabricAdditionalInterface $additional = null): IServiceManagerInterface
    {
        /** @var ServiceManagerConfigAdditional $additional */
        return new $className($additional);
    }
}
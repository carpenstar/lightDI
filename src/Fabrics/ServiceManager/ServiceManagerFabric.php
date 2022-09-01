<?php
namespace Carpenstar\DependencyInjection\Fabrics\ServiceManager;

use Carpenstar\DependencyInjection\Fabrics\AFabric;
use Carpenstar\DependencyInjection\Fabrics\IFabricParametersBagInterface;
use Carpenstar\DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;

class ServiceManagerFabric extends AFabric
{
    public static function make(string $className, ?IFabricParametersBagInterface $additional = null): IServiceManagerInterface
    {
        /** @var ServiceManagerConfigParametersBag $additional */
        return new $className($additional);
    }
}
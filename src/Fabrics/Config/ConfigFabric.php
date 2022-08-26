<?php
namespace DependencyInjection\Fabrics\Config;

use DependencyInjection\Config\Interfaces\IConfigInterface;
use DependencyInjection\Fabrics\AFabric;
use DependencyInjection\Fabrics\IFabricAdditionalInterface;

class ConfigFabric extends AFabric
{
    /**
     * @param string $className
     * @param IFabricAdditionalInterface|null $additional
     * @return IConfigInterface
     */
    public static function make(string $className, ?IFabricAdditionalInterface $additional = null): IConfigInterface
    {
        /** @var ConfigFabricAdditional $additional */
        return new $className($additional);
    }
}
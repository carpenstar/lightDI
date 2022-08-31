<?php
namespace Carpenstar\DependencyInjection\Fabrics\Config;

use Carpenstar\DependencyInjection\Config\Interfaces\IConfigInterface;
use Carpenstar\DependencyInjection\Fabrics\AFabric;
use Carpenstar\DependencyInjection\Fabrics\IFabricAdditionalInterface;

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
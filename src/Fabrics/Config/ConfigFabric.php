<?php
namespace Carpenstar\DependencyInjection\Fabrics\Config;

use Carpenstar\DependencyInjection\Config\Interfaces\IConfigInterface;
use Carpenstar\DependencyInjection\Fabrics\AFabric;
use Carpenstar\DependencyInjection\Fabrics\IFabricParametersBagInterface;

class ConfigFabric extends AFabric
{
    /**
     * @param string $className
     * @param IFabricParametersBagInterface|null $additional
     * @return IConfigInterface
     */
    public static function make(string $className, ?IFabricParametersBagInterface $additional = null): IConfigInterface
    {
        /** @var ConfigFabricParametersBag $additional */
        return new $className($additional);
    }
}
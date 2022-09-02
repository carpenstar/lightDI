<?php
namespace Carpenstar\DependencyInjection\Fabrics\Config;

use Carpenstar\DependencyInjection\Config\Interfaces\IConfigInterface;
use Carpenstar\DependencyInjection\Fabrics\AFabric;
use Carpenstar\DependencyInjection\Fabrics\IFabricBuildParamInterface;

class ConfigFabric extends AFabric
{
    /**
     * @param string $className
     * @param IFabricBuildParamInterface|null $additional
     * @return IConfigInterface
     */
    public static function make(string $className, ?IFabricBuildParamInterface $additional = null): IConfigInterface
    {
        /**
         * @var ConfigFabricBuildParam $additional
         * @var IConfigInterface $config
         */
        $config = new $className($additional);

        return $config->build();
    }
}
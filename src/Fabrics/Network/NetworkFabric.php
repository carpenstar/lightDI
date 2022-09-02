<?php
namespace Carpenstar\DependencyInjection\Fabrics\Network;

use Carpenstar\DependencyInjection\Fabrics\AFabric;
use Carpenstar\DependencyInjection\Fabrics\IFabricBuildParamInterface;
use Carpenstar\DependencyInjection\Network\Interfaces\INetworkInterface;

class NetworkFabric extends AFabric
{
    /**
     * @param string $className
     * @param IFabricBuildParamInterface|null $additional
     * @return INetworkInterface
     */
    public static function make(string $className, ?IFabricBuildParamInterface $additional = null): INetworkInterface
    {
        /**
         * @var NetworkConfigBuildParam $additional
         * @var INetworkInterface $network
         */
        $network = new $className($additional);
        return $network->build();
    }
}
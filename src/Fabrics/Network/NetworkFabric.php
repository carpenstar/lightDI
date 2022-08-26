<?php
namespace DependencyInjection\Fabrics\Network;

use DependencyInjection\Fabrics\AFabric;
use DependencyInjection\Fabrics\IFabricAdditionalInterface;
use DependencyInjection\Network\Interfaces\INetworkInterface;

class NetworkFabric extends AFabric
{
    /**
     * @param string $className
     * @param IFabricAdditionalInterface|null $additional
     * @return INetworkInterface
     */
    public static function make(string $className, ?IFabricAdditionalInterface $additional = null): INetworkInterface
    {
        /** @var NetworkConfigAdditional $additional */
        return new $className($additional);
    }
}
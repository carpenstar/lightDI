<?php
namespace Carpenstar\DependencyInjection\Fabrics\Network;

use Carpenstar\DependencyInjection\Fabrics\AFabric;
use Carpenstar\DependencyInjection\Fabrics\IFabricAdditionalInterface;
use Carpenstar\DependencyInjection\Network\Interfaces\INetworkInterface;

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
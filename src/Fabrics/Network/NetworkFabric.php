<?php
namespace Carpenstar\DependencyInjection\Fabrics\Network;

use Carpenstar\DependencyInjection\Fabrics\AFabric;
use Carpenstar\DependencyInjection\Fabrics\IFabricParametersBagInterface;
use Carpenstar\DependencyInjection\Network\Interfaces\INetworkInterface;

class NetworkFabric extends AFabric
{
    /**
     * @param string $className
     * @param IFabricParametersBagInterface|null $additional
     * @return INetworkInterface
     */
    public static function make(string $className, ?IFabricParametersBagInterface $additional = null): INetworkInterface
    {
        /**
         * @var NetworkConfigParametersBag $additional
         * @var INetworkInterface $network
         */
        $network = new $className($additional);
        return $network->build();
    }
}
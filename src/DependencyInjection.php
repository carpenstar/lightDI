<?php
namespace Carpenstar\DependencyInjection;

use Carpenstar\DependencyInjection\Network\Interfaces\INetworkInterface;
use Carpenstar\DependencyInjection\System\Abstracts\ABaseDependencyInjection;


class DependencyInjection extends ABaseDependencyInjection
{
    /**
     * @param string $networkId
     * @return INetworkInterface
     */
    public function getNetwork(string $networkId): INetworkInterface
    {
        return $this->buildNetwork($networkId);
    }

    /**
     * @param string $serviceId
     * @return object
     */
    public function getService(string $serviceId): object
    {
        return $this->getServiceManager()->get($serviceId);
    }
}
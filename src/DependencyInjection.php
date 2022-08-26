<?php
namespace DependencyInjection;

use DependencyInjection\Network\Interfaces\INetworkInterface;
use DependencyInjection\System\Abstracts\ABaseDependencyInjection;


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
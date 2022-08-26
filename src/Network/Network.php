<?php
namespace DependencyInjection\Network;

use DependencyInjection\Config\Args\ServiceArgs;
use DependencyInjection\Fabrics\IFabricAdditionalInterface;
use DependencyInjection\Fabrics\Network\NetworkConfigAdditional;
use DependencyInjection\Network\Abstracts\ANetwork;

class Network extends ANetwork
{
    /** @param NetworkConfigAdditional $additional */
    public function __construct(IFabricAdditionalInterface $additional)
    {
        $this->setConfig($additional->getConfig());
        $this->setServiceManager($additional->getServiceManager());
    }

    /**
     * @param string $networkId
     * @return $this
     */
    public function build(string $networkId): self
    {
        /** @var ServiceArgs $service */
        foreach ($this->getConfig()->getNetworkServices($networkId) as $service) {
            $this->setBuildService($service->getId(),
                $this->getServiceManager()->get($service->getId())
            );
        }
        return $this;
    }
}
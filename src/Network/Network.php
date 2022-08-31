<?php
namespace Carpenstar\DependencyInjection\Network;

use Carpenstar\DependencyInjection\Config\Args\ServiceArgs;
use Carpenstar\DependencyInjection\Fabrics\IFabricAdditionalInterface;
use Carpenstar\DependencyInjection\Fabrics\Network\NetworkConfigAdditional;
use Carpenstar\DependencyInjection\Network\Abstracts\ANetwork;

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
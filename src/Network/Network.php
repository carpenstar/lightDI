<?php
namespace Carpenstar\DependencyInjection\Network;

use Carpenstar\DependencyInjection\Config\Args\ServiceArgs;
use Carpenstar\DependencyInjection\Network\Abstracts\ANetwork;

class Network extends ANetwork
{
    /**
     * @param string $networkId
     * @return $this
     */
    public function build(string $networkId): self
    {
        /** @var ServiceArgs $service */
        foreach ($this->getConfig()->getNetworkServices($networkId) as $service) {
            $this->setBuildService($service->getId(),
                $this->getServiceManager()->setNetworkData($this->networkData)->get($service->getId())
            );
        }
        return $this;
    }

    /** @return NetworkDataBag|null */
    public function getNetworkData(): ?NetworkDataBag
    {
        return $this->networkData;
    }
}
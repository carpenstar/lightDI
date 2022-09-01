<?php
namespace Carpenstar\DependencyInjection\Fabrics\ServiceItem;

use Carpenstar\DependencyInjection\Config\Args\ServiceArgs;
use Carpenstar\DependencyInjection\Fabrics\ABaseConfigParametersBag;
use Carpenstar\DependencyInjection\Network\NetworkDataBag;

class ServiceItemParametersBag extends ABaseConfigParametersBag
{
    /** @var ServiceArgs $serviceArgs */
    private ServiceArgs $serviceArgs;

    /** @return ServiceArgs */
    public function getServiceArgs(): ServiceArgs
    {
        return $this->serviceArgs;
    }

    /**
     * @param ServiceArgs $serviceArgs
     * @return $this
     */
    public function setServiceArgs(ServiceArgs $serviceArgs): self
    {
        $this->serviceArgs = $serviceArgs;
        return $this;
    }

    public function setNetworkData(NetworkDataBag $networkData): self
    {
        $this->networkData = $networkData;
        return $this;
    }

    /** @return NetworkDataBag|null */
    public function getNetworkData(): ?NetworkDataBag
    {
        return $this->networkData;
    }
}
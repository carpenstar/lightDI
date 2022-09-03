<?php
namespace Carpenstar\DependencyInjection\Fabrics\ServiceItem;

use Carpenstar\DependencyInjection\Config\Args\ServiceArgs;
use Carpenstar\DependencyInjection\Fabrics\IFabricBuildParamInterface;
use Carpenstar\DependencyInjection\Network\NetworkData;

class ServiceItemBuildParam implements IFabricBuildParamInterface
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

    public function setNetworkData(NetworkData $networkData): self
    {
        $this->networkData = $networkData;
        return $this;
    }

    /** @return NetworkData|null */
    public function getNetworkData(): ?NetworkData
    {
        return $this->networkData;
    }
}
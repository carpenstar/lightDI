<?php
namespace DependencyInjection\Fabrics\ServiceItem;

use DependencyInjection\Config\Args\ServiceArgs;
use DependencyInjection\Fabrics\ABaseConfigAdditional;

class ServiceItemAdditional extends ABaseConfigAdditional
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
}
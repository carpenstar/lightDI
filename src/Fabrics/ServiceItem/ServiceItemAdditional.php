<?php
namespace Carpenstar\DependencyInjection\Fabrics\ServiceItem;

use Carpenstar\DependencyInjection\Config\Args\ServiceArgs;
use Carpenstar\DependencyInjection\Fabrics\ABaseConfigAdditional;

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
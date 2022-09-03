<?php
namespace Carpenstar\DependencyInjection\Fabrics\ServiceManager;

use Carpenstar\DependencyInjection\Config\Interfaces\IConfigInterface;
use Carpenstar\DependencyInjection\Fabrics\IFabricBuildParamInterface;

class ServiceManagerBuildParam implements IFabricBuildParamInterface
{
    /** @var IConfigInterface $config */
    private IConfigInterface $config;

    /** @return IConfigInterface */
    public function getConfig(): IConfigInterface
    {
        return $this->config;
    }

    /** @param IConfigInterface $config */
    public function setConfig(IConfigInterface $config): self
    {
        $this->config = $config;
        return $this;
    }
}
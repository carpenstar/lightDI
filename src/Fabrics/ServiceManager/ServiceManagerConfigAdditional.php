<?php
namespace DependencyInjection\Fabrics\ServiceManager;

use DependencyInjection\Config\Interfaces\IConfigInterface;
use DependencyInjection\Fabrics\ABaseConfigAdditional;

class ServiceManagerConfigAdditional extends ABaseConfigAdditional
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
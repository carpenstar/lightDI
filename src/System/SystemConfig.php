<?php
namespace DependencyInjection\System;

use DependencyInjection\System\Interfaces\ISystemConfigInterface;

class SystemConfig implements ISystemConfigInterface
{
    /** @var string $serviceConfigFilePath*/
    private string $serviceConfigFilePath;

    /** @return string */
    public function getServiceConfigFilePath(): string
    {
        return $this->serviceConfigFilePath;
    }

    /**
     * @param string $serviceConfigFilePath
     * @return $this
     */
    public function setServiceConfigFilePath(string $serviceConfigFilePath): self
    {
        $this->serviceConfigFilePath = $serviceConfigFilePath;
        return $this;
    }
}
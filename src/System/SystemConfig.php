<?php
namespace DependencyInjection\System;

use DependencyInjection\System\Interfaces\ISystemConfigInterface;

class SystemConfig implements ISystemConfigInterface
{
    /** @var string $configPath */
    private string $configPath;

    public function __construct(array $arrSettings)
    {
        $this->setConfigFilePath($arrSettings["config_path"]);
    }

    /** @return string */
    public function getConfigFilePath(): string
    {
        return $this->configPath;
    }

    /**
     * @param string $serviceConfigFilePath
     * @return $this
     */
    private function setConfigFilePath(string $serviceConfigFilePath): self
    {
        $this->configPath = $serviceConfigFilePath;
        return $this;
    }
}
<?php
namespace Carpenstar\DependencyInjection\System;

use Carpenstar\DependencyInjection\System\Interfaces\ISystemConfigInterface;

class SystemConfig implements ISystemConfigInterface
{
    /** @var string $configPath */
    private string $configPath;

    /** @var bool $isUseNetworkData */
    private bool $isUseNetworkData = true;

    /**
     * @param array|null $arrSettings
     */
    public function __construct(?array $arrSettings = null)
    {
        if (!empty($arrSettings["config_path"])) {
            $this->setConfigFilePath($arrSettings["config_path"]);
        }
        if (!empty($arrSettings["is_use_network_data"])) {
            $this->setIsUseNetworkData($arrSettings["is_use_network_data"]);
        }
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
    public function setConfigFilePath(string $serviceConfigFilePath): self
    {
        $this->configPath = $serviceConfigFilePath;
        return $this;
    }

    /** @return boolean */
    public function getIsUseNetworkData(): bool
    {
        return $this->isUseNetworkData;
    }

    /**
     * @param bool $isUseNetworkData
     * @return $this
     */
    public function setIsUseNetworkData(bool $isUseNetworkData): self
    {
        $this->isUseNetworkData = $isUseNetworkData;
        return $this;
    }
}
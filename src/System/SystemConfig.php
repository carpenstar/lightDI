<?php
namespace Carpenstar\DependencyInjection\System;

use Carpenstar\DependencyInjection\System\Interfaces\ISystemConfigInterface;

class SystemConfig implements ISystemConfigInterface
{
    /** @var string $configPath */
    private string $configPath;

    /**
     * @param array|null $arrSettings
     */
    public function __construct(?array $arrSettings = null)
    {
        if (!empty($arrSettings)) {
            $this->setConfigFilePath($arrSettings["config_path"]);
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
}
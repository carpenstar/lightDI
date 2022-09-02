<?php
namespace Carpenstar\DependencyInjection\Fabrics\Config;

use Carpenstar\DependencyInjection\Fabrics\ABaseConfigParametersBag;

class ConfigFabricParametersBag extends ABaseConfigParametersBag
{
    /** @var string $configFilePath */
    private string $configFilePath;

    /** @var string $fileLoader */
    private string $fileLoader;

    /** @var string $configBuilder */
    private string $configBuilder;

    /** @return string */
    public function getConfigBuilder(): string
    {
        return $this->configBuilder;
    }

    /**
     * @param string $configBuilder
     * @return $this
     */
    public function setConfigBuilder(string $configBuilder): self
    {
        $this->configBuilder = $configBuilder;
        return $this;
    }

    /** @return string */
    public function getFileLoader(): string
    {
        return $this->fileLoader;
    }

    /**
     * @param string $fileLoader
     * @return $this
     */
    public function setFileLoader(string $fileLoader): self
    {
        $this->fileLoader = $fileLoader;
        return $this;
    }

    /** @return string */
    public function getConfigFilePath(): string
    {
        return $this->configFilePath;
    }

    /**
     * @param string $configFilePath
     * @return $this
     */
    public function setConfigFilePath(string $configFilePath): self
    {
        $this->configFilePath = $configFilePath;
        return $this;
    }
}
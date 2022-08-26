<?php
namespace DependencyInjection\Fabrics\Config;

use DependencyInjection\Fabrics\IFabricAdditionalInterface;

class ConfigFabricAdditional implements IFabricAdditionalInterface
{
    /** @var string $serviceConfigFilePath */
    private string $serviceConfigFilePath;

    /** @var string $fileLoaderClassName */
    private string $fileLoaderClassName;

    /** @var string $configBuilderClassName */
    private string $configBuilderClassName;

    /** @return string */
    public function getConfigBuilderClassName(): string
    {
        return $this->configBuilderClassName;
    }

    /** @return string */
    public function getFileLoaderClassName(): string
    {
        return $this->fileLoaderClassName;
    }

    /** @return string */
    public function getServiceConfigFilePath(): string
    {
        return $this->serviceConfigFilePath;
    }

    /**
     * @param string $configBuilderClassName
     * @return $this
     */
    public function setConfigBuilderClassName(string $configBuilderClassName): self
    {
        $this->configBuilderClassName = $configBuilderClassName;
        return $this;
    }

    /**
     * @param string $fileLoaderClassName
     * @return $this
     */
    public function setFileLoaderClassName(string $fileLoaderClassName): self
    {
        $this->fileLoaderClassName = $fileLoaderClassName;
        return $this;
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
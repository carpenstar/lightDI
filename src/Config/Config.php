<?php
namespace DependencyInjection\Config;

use DependencyInjection\Fabrics\ConfigBuilder\ConfigBuilderFabric;
use DependencyInjection\Config\Args\ParamArgs;
use DependencyInjection\Config\Args\ServiceArgs;
use DependencyInjection\Fabrics\Config\ConfigFabricAdditional;
use DependencyInjection\Fabrics\IFabricAdditionalInterface;
use DependencyInjection\Fabrics\FileLoader\FileLoaderFabric;
use DependencyInjection\Config\Interfaces\Builder\IConfigBuilderInterface;
use DependencyInjection\Config\Interfaces\IConfigInterface;
use DependencyInjection\File\Interfaces\IFileLoaderInterface;

class Config implements IConfigInterface
{
    /** @var string $filePath */
    private string $filePath;

    /** @var array $config */
    private array $config = [];

    /** @var IFileLoaderInterface $loader */
    private IFileLoaderInterface $loader;

    /** @var IConfigBuilderInterface $configBuilder */
    private IConfigBuilderInterface $configBuilder;

    /** @param ConfigFabricAdditional $args */
    public function __construct(IFabricAdditionalInterface $args)
    {
        $this->setFilePath($args->getServiceConfigFilePath());
        $this->buildLoader($args->getFileLoaderClassName());
        $this->setConfigBuilder($args->getConfigBuilderClassName());
    }

    /** @return $this */
    public function build(): self
    {
        $this->config = $this->configBuilder->build(
            $this->loader->load()
        );

        return $this;
    }

    /** @return ParamArgs[] */
    public function getParameters(): array
    {
        return $this->config["parameters"];
    }

    /** @return ServiceArgs[] */
    public function getServices(): array
    {
        return $this->config['services'];
    }

    /**
     * @param string $serviceId
     * @return ServiceArgs
     */
    public function getServiceArgs(string $serviceId): ServiceArgs
    {
        return $this->getServices()[$serviceId];
    }

    /**
     * @param string $parameterId
     * @return ParamArgs
     */
    public function getParameter(string $parameterId): ParamArgs
    {
        return $this->getParameters()[$parameterId];
    }

    /**
     * @param string $networkName
     * @return array
     */
    public function getNetworkServices(string $networkName): array
    {
        $serviceList = [];
        /** @var ServiceArgs $serviceArgs */
        foreach ($this->getServices() as $serviceArgs) {
            if ($serviceArgs->getNetwork() == $networkName) {
                $serviceList[] = $serviceArgs;
            }
        }

        return $serviceList;
    }

    /**
     * @param string $filePath
     * @return IConfigInterface
     */
    protected function setFilePath(string $filePath): IConfigInterface
    {
        $this->filePath = $filePath;
        return $this;
    }

    /** @return $this */
    protected function buildLoader(string $fileLoaderClassName): self
    {
        $this->loader = FileLoaderFabric::make($fileLoaderClassName)->setFilePath($this->filePath);
        return $this;
    }

    /** @return $this */
    protected function setConfigBuilder(string $configBuilderClassName): self
    {
        $this->configBuilder = ConfigBuilderFabric::make($configBuilderClassName);
        return $this;
    }

}
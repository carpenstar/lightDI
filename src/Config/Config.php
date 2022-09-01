<?php
namespace Carpenstar\DependencyInjection\Config;

use Carpenstar\DependencyInjection\Fabrics\ConfigBuilder\ConfigBuilderFabric;
use Carpenstar\DependencyInjection\Config\Args\ParamArgs;
use Carpenstar\DependencyInjection\Config\Args\ServiceArgs;
use Carpenstar\DependencyInjection\Fabrics\Config\ConfigFabricParametersBag;
use Carpenstar\DependencyInjection\Fabrics\IFabricParametersBagInterface;
use Carpenstar\DependencyInjection\Fabrics\FileLoader\FileLoaderFabric;
use Carpenstar\DependencyInjection\Config\Interfaces\Builder\IConfigBuilderInterface;
use Carpenstar\DependencyInjection\Config\Interfaces\IConfigInterface;
use Carpenstar\DependencyInjection\File\Interfaces\IFileLoaderInterface;

class Config implements IConfigInterface
{
    /** @var array $config */
    private array $config = [];

    /** @var IFileLoaderInterface $loader */
    private IFileLoaderInterface $loader;

    /** @var IConfigBuilderInterface $configBuilder */
    private IConfigBuilderInterface $configBuilder;

    /** @param ConfigFabricParametersBag $args */
    public function __construct(IFabricParametersBagInterface $args)
    {
        $filePath = $args->getServiceConfigFilePath();
        $fileLoaderClass = $args->getFileLoaderClassName();
        $configBuilderClass = $args->getConfigBuilderClassName();

        $this->loader = FileLoaderFabric::make($fileLoaderClass)->setFilePath($filePath);
        $this->configBuilder = ConfigBuilderFabric::make($configBuilderClass);
    }

    /** @return $this */
    public function build(): self
    {
        $dataFromFile = $this->loader->load();
        $this->config = $this->configBuilder->build($dataFromFile);
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
}
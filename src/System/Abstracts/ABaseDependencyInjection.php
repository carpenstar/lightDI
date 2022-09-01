<?php
namespace Carpenstar\DependencyInjection\System\Abstracts;

use Carpenstar\DependencyInjection\Config\Builder\ConfigBuilder;
use Carpenstar\DependencyInjection\Config\Config;
use Carpenstar\DependencyInjection\Fabrics\Config\ConfigFabric;
use Carpenstar\DependencyInjection\Fabrics\Config\ConfigFabricParametersBag;
use Carpenstar\DependencyInjection\Config\Interfaces\IConfigInterface;
use Carpenstar\DependencyInjection\Fabrics\Network\NetworkConfigParametersBag;
use Carpenstar\DependencyInjection\Fabrics\Network\NetworkFabric;
use Carpenstar\DependencyInjection\File\FileLoaderHelper;
use Carpenstar\DependencyInjection\Network\Interfaces\INetworkInterface;
use Carpenstar\DependencyInjection\Network\Network;
use Carpenstar\DependencyInjection\Fabrics\ServiceManager\ServiceManagerFabric;
use Carpenstar\DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;
use Carpenstar\DependencyInjection\ServiceManager\ServiceManager;
use Carpenstar\DependencyInjection\Fabrics\ServiceManager\ServiceManagerConfigParametersBag;
use Carpenstar\DependencyInjection\System\Interfaces\IDependencyInjectionInterface;
use Carpenstar\DependencyInjection\System\Interfaces\ISystemConfigInterface;

abstract class ABaseDependencyInjection implements IDependencyInjectionInterface
{
    /** @var string $filePathServiceConfig */
    private string $filePathServiceConfig;

    /** @var string $fileLoaderClassName */
    private string $fileLoaderClassName;

    /** @var string $configBuilderClassName */
    private string $configBuilderClassName;

    /** @var IConfigInterface $serviceConfig */
    private IConfigInterface $serviceConfig;

    /** @var IServiceManagerInterface */
    protected IServiceManagerInterface $serviceManager;

    /** @var INetworkInterface $network */
    protected INetworkInterface $network;

    /**
     * @param string $networkId
     * @return INetworkInterface
     */
    abstract public function getNetwork(string $networkId): INetworkInterface;

    /**
     * @param string $serviceId
     * @return object
     */
    abstract public function getService(string $serviceId): object;


    /** @param ISystemConfigInterface $sysConfig */
    public function __construct(ISystemConfigInterface $sysConfig)
    {
        $this->filePathServiceConfig = $sysConfig->getConfigFilePath();
        $this->fileLoaderClassName = FileLoaderHelper::getFileLoaderClassName($sysConfig->getConfigFilePath());
        $this->configBuilderClassName = ConfigBuilder::class;

        $this->buildServiceConfig();
        $this->buildServiceManager();
    }

    /** @return IConfigInterface */
    public function getServiceConfig(): IConfigInterface
    {
        return $this->serviceConfig;
    }

    /** @return IServiceManagerInterface */
    public function getServiceManager(): IServiceManagerInterface
    {
        return $this->serviceManager;
    }

    /** @return $this */
    protected function buildServiceConfig(): self
    {
        $additional = (new ConfigFabricParametersBag())
            ->setServiceConfigFilePath($this->filePathServiceConfig)
            ->setFileLoaderClassName($this->fileLoaderClassName)
            ->setConfigBuilderClassName($this->configBuilderClassName);

        $this->serviceConfig = ConfigFabric::make(Config::class, $additional)->build();
        return $this;
    }

    /**
     * @param string $networkId
     * @return INetworkInterface
     */
    protected function buildNetwork(string $networkId): INetworkInterface
    {
        $additional = (new NetworkConfigParametersBag())
            ->setServiceConfig($this->serviceConfig)
            ->setServiceManager($this->serviceManager);

        $this->network = NetworkFabric::make(Network::class, $additional)->build($networkId);
        return $this->network;
    }

    /** @return $this */
    protected function buildServiceManager(): self
    {
        $additional = (new ServiceManagerConfigParametersBag())
            ->setConfig($this->serviceConfig);

        $this->serviceManager = ServiceManagerFabric::make(ServiceManager::class, $additional);
        return $this;
    }
}
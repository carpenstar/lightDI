<?php
namespace Carpenstar\DependencyInjection;

use Carpenstar\DependencyInjection\Config\Builder\ConfigBuilder;
use Carpenstar\DependencyInjection\Config\Config;
use Carpenstar\DependencyInjection\Config\Interfaces\IConfigInterface;
use Carpenstar\DependencyInjection\Fabrics\Config\ConfigFabric;
use Carpenstar\DependencyInjection\Fabrics\Config\ConfigFabricBuildParam;
use Carpenstar\DependencyInjection\Fabrics\Network\NetworkConfigBuildParam;
use Carpenstar\DependencyInjection\Fabrics\Network\NetworkFabric;
use Carpenstar\DependencyInjection\Fabrics\ServiceManager\ServiceManagerBuildParam;
use Carpenstar\DependencyInjection\Fabrics\ServiceManager\ServiceManagerFabric;
use Carpenstar\DependencyInjection\File\FileLoaderHelper;
use Carpenstar\DependencyInjection\Network\Interfaces\INetworkInterface;
use Carpenstar\DependencyInjection\Network\Network;
use Carpenstar\DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;
use Carpenstar\DependencyInjection\ServiceManager\ServiceManager;
use Carpenstar\DependencyInjection\System\Interfaces\IDependencyInjectionInterface;
use Carpenstar\DependencyInjection\System\Interfaces\ISystemConfigInterface;

/**
 * class DependencyInjection
 */
class DependencyInjection implements IDependencyInjectionInterface
{
    /** @var string $configPath */
    private string $configPath;

    /** @var string $fileLoader */
    private string $fileLoader;

    /** @var string $configBuilder */
    private string $configBuilder;

    /** @var IConfigInterface $config */
    private IConfigInterface $config;

    /** @var IServiceManagerInterface */
    protected IServiceManagerInterface $serviceManager;

    /** @var INetworkInterface $network */
    protected INetworkInterface $network;

    /** @param ISystemConfigInterface $sysConfig */
    public function __construct(ISystemConfigInterface $sysConfig)
    {
        $this->configPath = $sysConfig->getConfigFilePath();
        $this->fileLoader = FileLoaderHelper::getFileLoaderClassName($sysConfig->getConfigFilePath());
        $this->configBuilder = ConfigBuilder::class;

        $this->buildServiceConfig();
        $this->buildServiceManager();
    }

    /**
     * @param string $networkId
     * @return INetworkInterface
     */
    public function getNetwork(string $networkId): INetworkInterface
    {
        return $this->buildNetwork($networkId);
    }

    /**
     * @param string $serviceId
     * @return object
     */
    public function getService(string $serviceId): object
    {
        return $this->getServiceManager()->get($serviceId);
    }

    /** @return IConfigInterface */
    public function getConfig(): IConfigInterface
    {
        return $this->config;
    }

    /** @return IServiceManagerInterface */
    public function getServiceManager(): IServiceManagerInterface
    {
        return $this->serviceManager;
    }

    /** @return $this */
    protected function buildServiceConfig(): self
    {
        $buildParams = (new ConfigFabricBuildParam())
            ->setConfigFilePath($this->configPath)
            ->setFileLoader($this->fileLoader)
            ->setConfigBuilder($this->configBuilder);
        $this->config = ConfigFabric::make(Config::class, $buildParams);

        return $this;
    }

    /**
     * @param string $networkId
     * @return INetworkInterface
     */
    protected function buildNetwork(string $networkId): INetworkInterface
    {
        $buildParams = (new NetworkConfigBuildParam())
            ->setNetworkId($networkId)
            ->setServiceConfig($this->config)
            ->setServiceManager($this->serviceManager);
        $this->network = NetworkFabric::make(Network::class, $buildParams);

        return $this->network;
    }

    /** @return $this */
    protected function buildServiceManager(): self
    {
        $buildParam = (new ServiceManagerBuildParam())->setConfig($this->config);
        $this->serviceManager = ServiceManagerFabric::make(ServiceManager::class, $buildParam);

        return $this;
    }
}
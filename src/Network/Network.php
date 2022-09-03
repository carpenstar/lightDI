<?php
namespace Carpenstar\DependencyInjection\Network;

use Carpenstar\DependencyInjection\Config\Args\ServiceArgs;
use Carpenstar\DependencyInjection\Config\Interfaces\IConfigInterface;
use Carpenstar\DependencyInjection\Fabrics\IFabricBuildParamInterface;
use Carpenstar\DependencyInjection\Fabrics\Network\NetworkConfigBuildParam;
use Carpenstar\DependencyInjection\Network\Interfaces\INetworkInterface;
use Carpenstar\DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;

class Network implements INetworkInterface
{
    /** @var string $networkId */
    private string $networkId;

    /** @var array $buildServices */
    private array $buildServices = [];

    /** @var IConfigInterface $config */
    private IConfigInterface $config;

    /** @var IServiceManagerInterface $serviceManager */
    private IServiceManagerInterface $serviceManager;

    /** @param NetworkConfigBuildParam $buildParam */
    public function __construct(IFabricBuildParamInterface $buildParam)
    {
        $this->networkId = $buildParam->getNetworkId();
        Network::getNetworkData()->registerNetwork($buildParam->getNetworkId());
        
        $this->config = $buildParam->getConfig();
        $this->serviceManager = $buildParam->getServiceManager();
    }

    /** @return NetworkData|null */
    public static function getNetworkData(): ?NetworkData
    {
        return NetworkData::getInstance();
    }

    /** @return $this */
    public function build(): self
    {
        /** @var ServiceArgs $service */
        foreach ($this->getConfig()->getNetworkServices($this->networkId) as $service) {
            $this->setBuildService($service->getId(),
                $this->getServiceManager()->get($service->getId())
            );
        }
        return $this;
    }

    /** @return array */
    public function getBuildServices(): array
    {
        return $this->buildServices;
    }

    /**
     * @param string $serviceId
     * @return object
     */
    public function getService(string $serviceId): object
    {
        return $this->getBuildServices()[$serviceId];
    }

    /**
     * @param string $serviceId
     * @param object $objectService
     * @return $this
     */
    public function setBuildService(string $serviceId, object $objectService): self
    {
        $this->buildServices[$serviceId] = $objectService;
        return $this;
    }

    /** @return array */
    public function getServiceList(): array
    {
        return array_keys($this->buildServices);
    }

    /** @return IConfigInterface */
    protected function getConfig(): IConfigInterface
    {
        return $this->config;
    }

    /** @return IServiceManagerInterface */
    protected function getServiceManager(): IServiceManagerInterface
    {
        return $this->serviceManager;
    }
}
<?php
namespace Carpenstar\DependencyInjection\Network\Abstracts;

use Carpenstar\DependencyInjection\Config\Interfaces\IConfigInterface;
use Carpenstar\DependencyInjection\Fabrics\IFabricParametersBagInterface;
use Carpenstar\DependencyInjection\Fabrics\Network\NetworkConfigParametersBag;
use Carpenstar\DependencyInjection\Network\Interfaces\INetworkInterface;
use Carpenstar\DependencyInjection\Network\NetworkDataBag;
use Carpenstar\DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;

abstract class ANetwork implements INetworkInterface
{

    /** @var NetworkDataBag $networkData */
    protected NetworkDataBag $networkData;

    /** @var array $buildServices */
    private array $buildServices = [];

    /** @var IConfigInterface $config */
    private IConfigInterface $config;

    /** @var IServiceManagerInterface $serviceManager */
    private IServiceManagerInterface $serviceManager;

    /**
     * @param string $networkId
     * @return INetworkInterface
     */
    abstract public function build(string $networkId): INetworkInterface;

    /** @param NetworkConfigParametersBag $parametersBag */
    public function __construct(IFabricParametersBagInterface $parametersBag)
    {
        $this->config = $parametersBag->getConfig();
        $this->serviceManager = $parametersBag->getServiceManager();
        $this->networkData = NetworkDataBag::getInstance();
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

}
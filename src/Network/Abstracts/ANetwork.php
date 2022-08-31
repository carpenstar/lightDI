<?php
namespace Carpenstar\DependencyInjection\Network\Abstracts;

use Carpenstar\DependencyInjection\Config\Interfaces\IConfigInterface;
use Carpenstar\DependencyInjection\Fabrics\IFabricAdditionalInterface;
use Carpenstar\DependencyInjection\Network\Interfaces\INetworkInterface;
use Carpenstar\DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;

abstract class ANetwork implements INetworkInterface
{
    /** @var array $buildServices */
    private array $buildServices = [];

    /** @var IConfigInterface $config */
    private IConfigInterface $config;

    /** @var IServiceManagerInterface $serviceManager */
    private IServiceManagerInterface $serviceManager;

    /** @param IFabricAdditionalInterface $additional */
    abstract public function __construct(IFabricAdditionalInterface $additional);

    /**
     * @param string $networkId
     * @return INetworkInterface
     */
    abstract public function build(string $networkId): INetworkInterface;

    /**
     * @param IConfigInterface $config
     * @return $this
     */
    public function setConfig(IConfigInterface $config): self
    {
        $this->config = $config;
        return $this;
    }

    /** @return IConfigInterface */
    public function getConfig(): IConfigInterface
    {
        return $this->config;
    }

    /**
     * @param IServiceManagerInterface $serviceManager
     * @return $this
     */
    public function setServiceManager(IServiceManagerInterface $serviceManager): self
    {
        $this->serviceManager = $serviceManager;
        return $this;
    }

    /** @return IServiceManagerInterface */
    public function getServiceManager(): IServiceManagerInterface
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

}
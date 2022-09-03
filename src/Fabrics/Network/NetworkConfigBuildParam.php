<?php
namespace Carpenstar\DependencyInjection\Fabrics\Network;

use Carpenstar\DependencyInjection\Config\Interfaces\IConfigInterface;
use Carpenstar\DependencyInjection\Fabrics\IFabricBuildParamInterface;
use Carpenstar\DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;

class NetworkConfigBuildParam implements IFabricBuildParamInterface
{
    /** @var string $networkId */
    private string $networkId;

    /** @var IConfigInterface $config */
    private IConfigInterface $config;

    /** @var IServiceManagerInterface $serviceManager*/
    private IServiceManagerInterface $serviceManager;

    /** @return IConfigInterface */
    public function getConfig(): IConfigInterface
    {
        return $this->config;
    }

    /**
     * @param IConfigInterface $config
     * @return $this
     */
    public function setServiceConfig(IConfigInterface $config): self
    {
        $this->config = $config;
        return $this;
    }

    /** @return IServiceManagerInterface */
    public function getServiceManager(): IServiceManagerInterface
    {
        return $this->serviceManager;
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

    /** @return string */
    public function getNetworkId(): string
    {
        return $this->networkId;
    }

    /**
     * @param string $networkId
     * @return NetworkConfigBuildParam
     */
    public function setNetworkId(string $networkId): self
    {
        $this->networkId = $networkId;
        return $this;
    }
}
<?php
namespace DependencyInjection\System\Interfaces;

use DependencyInjection\Config\Interfaces\IConfigInterface;
use DependencyInjection\Network\Interfaces\INetworkInterface;
use DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;

interface IDependencyInjectionInterface
{
    /** @param ISystemConfigInterface $config */
    public function __construct(ISystemConfigInterface $config);

    /**
     * @param string $serviceId
     * @return object
     */
    public function getService(string $serviceId): object;

    /**
     * @param string $networkId
     * @return INetworkInterface
     */
    public function getNetwork(string $networkId): INetworkInterface;

    /** @return IConfigInterface */
    public function getServiceConfig(): IConfigInterface;

    /** @return IServiceManagerInterface */
    public function getServiceManager(): IServiceManagerInterface;
}
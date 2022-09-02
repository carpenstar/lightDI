<?php
namespace Carpenstar\DependencyInjection\System\Interfaces;

use Carpenstar\DependencyInjection\Config\Interfaces\IConfigInterface;
use Carpenstar\DependencyInjection\Network\Interfaces\INetworkInterface;
use Carpenstar\DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;

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
    public function getConfig(): IConfigInterface;

    /** @return IServiceManagerInterface */
    public function getServiceManager(): IServiceManagerInterface;
}
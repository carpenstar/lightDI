<?php
namespace Carpenstar\DependencyInjection\Network\Interfaces;

use Carpenstar\DependencyInjection\Fabrics\IFabricBuildParamInterface;
use Carpenstar\DependencyInjection\Fabrics\Network\NetworkConfigBuildParam;
use Carpenstar\DependencyInjection\Network\Network;
use Carpenstar\DependencyInjection\Network\NetworkData;

interface INetworkInterface
{
    /** @param NetworkConfigBuildParam $parametersBag */
    public function __construct(IFabricBuildParamInterface $parametersBag);

    /** @return INetworkInterface */
    public function build(): INetworkInterface;

    /** @return NetworkData|null */
    public function getNetworkData(): ?NetworkData;

    /** @return array */
    public function getServiceList(): array;

    /** @return array */
    public function getBuildServices(): array;

    /**
     * @param string $serviceId
     * @param object $objectService
     * @return $this
     */
    public function setBuildService(string $serviceId, object $objectService): self;

    /**
     * @param string $serviceId
     * @return object
     */
    public function getService(string $serviceId): object;
}
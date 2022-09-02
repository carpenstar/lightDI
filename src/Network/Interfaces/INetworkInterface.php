<?php
namespace Carpenstar\DependencyInjection\Network\Interfaces;

use Carpenstar\DependencyInjection\Fabrics\IFabricParametersBagInterface;
use Carpenstar\DependencyInjection\Fabrics\Network\NetworkConfigParametersBag;
use Carpenstar\DependencyInjection\Network\Network;
use Carpenstar\DependencyInjection\Network\NetworkDataBag;

interface INetworkInterface
{
    /** @param NetworkConfigParametersBag $parametersBag */
    public function __construct(IFabricParametersBagInterface $parametersBag);

    /** @return INetworkInterface */
    public function build(): INetworkInterface;

    /** @return NetworkDataBag|null */
    public function getNetworkData(): ?NetworkDataBag;

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
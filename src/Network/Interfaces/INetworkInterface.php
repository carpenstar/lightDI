<?php
namespace Carpenstar\DependencyInjection\Network\Interfaces;

use Carpenstar\DependencyInjection\Network\NetworkDataBag;

interface INetworkInterface
{
    /**
     * @param string $networkId
     * @return INetworkInterface
     */
    public function build(string $networkId): INetworkInterface;

    /**
     * @param string $serviceId
     * @return object
     */
    public function getService(string $serviceId): object;

    /** @return NetworkDataBag|null */
    public function getNetworkData(): ?NetworkDataBag;

    /** @return array */
    public function getServiceList(): array;
}
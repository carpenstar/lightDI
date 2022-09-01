<?php
namespace Carpenstar\DependencyInjection\ServiceManager\Interfaces;

use Carpenstar\DependencyInjection\Fabrics\IFabricParametersBagInterface;
use Carpenstar\DependencyInjection\Network\NetworkDataBag;

interface IServiceManagerInterface
{
    /** @param IFabricParametersBagInterface $additional */
    public function __construct(IFabricParametersBagInterface $additional);

    /**
     * @param string $serviceId
     * @return object
     */
    public function get(string $serviceId): object;

    /**
     * @param NetworkDataBag|null $networkData
     * @return $this
     */
    public function setNetworkData(?NetworkDataBag $networkData): self;

    /** @return NetworkDataBag|null */
    public function getNetworkData(): ?NetworkDataBag;
}
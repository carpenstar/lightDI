<?php
namespace Carpenstar\DependencyInjection\ServiceManager\Interfaces;

use Carpenstar\DependencyInjection\Fabrics\IFabricBuildParamInterface;
use Carpenstar\DependencyInjection\Network\NetworkData;

interface IServiceManagerInterface
{
    /** @param IFabricBuildParamInterface $additional */
    public function __construct(IFabricBuildParamInterface $additional);

    /**
     * @param string $serviceId
     * @return object
     */
    public function get(string $serviceId): object;
}
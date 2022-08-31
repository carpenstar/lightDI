<?php
namespace Carpenstar\DependencyInjection\ServiceManager\Interfaces;

use Carpenstar\DependencyInjection\Fabrics\IFabricAdditionalInterface;

interface IServiceManagerInterface
{
    /** @param IFabricAdditionalInterface $additional */
    public function __construct(IFabricAdditionalInterface $additional);

    /**
     * @param string $serviceId
     * @return object
     */
    public function get(string $serviceId): object;
}
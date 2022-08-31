<?php
namespace Carpenstar\DependencyInjection\Network\Interfaces;

interface INetworkInterface
{
    public function build(string $networkId):INetworkInterface;
    public function getService(string $serviceId): object;
}
<?php
namespace Carpenstar\DependencyInjection\Config\Interfaces;

interface IConfigInterface
{
    /** @return $this */
    public function build(): self;

    /**
     * @param string $networkName
     * @return array
     */
    public function getNetworkServices(string $networkName): array;
}
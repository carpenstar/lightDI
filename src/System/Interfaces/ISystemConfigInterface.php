<?php
namespace DependencyInjection\System\Interfaces;

interface ISystemConfigInterface
{
    /** @return string */
    public function getServiceConfigFilePath(): string;

    /**
     * @param string $serviceConfigFilePath
     * @return $this
     */
    public function setServiceConfigFilePath(string $serviceConfigFilePath): self;

}
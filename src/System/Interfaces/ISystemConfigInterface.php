<?php
namespace Carpenstar\DependencyInjection\System\Interfaces;

use Carpenstar\DependencyInjection\System\SystemConfig;

interface ISystemConfigInterface
{
    /**
     * @param array|null $arrSettings
     */
    public function __construct(?array $arrSettings = null);

    /** @return string */
    public function getConfigFilePath(): string;

    /**
     * @param string $serviceConfigFilePath
     * @return $this
     */
    public function setConfigFilePath(string $serviceConfigFilePath): self;
}
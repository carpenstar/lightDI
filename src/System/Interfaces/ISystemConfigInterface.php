<?php
namespace Carpenstar\DependencyInjection\System\Interfaces;

interface ISystemConfigInterface
{
    /** @return string */
    public function getConfigFilePath(): string;
}
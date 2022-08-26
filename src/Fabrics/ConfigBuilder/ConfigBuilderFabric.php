<?php
namespace DependencyInjection\Fabrics\ConfigBuilder;

use DependencyInjection\Config\Interfaces\Builder\IConfigBuilderInterface;
use DependencyInjection\Fabrics\AFabric;

class ConfigBuilderFabric extends AFabric
{
    public static function make(string $className) : IConfigBuilderInterface
    {
        return new $className();
    }
}
<?php
namespace Carpenstar\DependencyInjection\Fabrics\ConfigBuilder;

use Carpenstar\DependencyInjection\Config\Interfaces\Builder\IConfigBuilderInterface;
use Carpenstar\DependencyInjection\Fabrics\AFabric;

class ConfigBuilderFabric extends AFabric
{
    public static function make(string $className) : IConfigBuilderInterface
    {
        return new $className();
    }
}
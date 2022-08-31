<?php
namespace Carpenstar\DependencyInjection\Fabrics\FileLoader;

use Carpenstar\DependencyInjection\Fabrics\AFabric;
use Carpenstar\DependencyInjection\File\Interfaces\IFileLoaderInterface;

class FileLoaderFabric extends AFabric
{
    public static function make(string $className) : IFileLoaderInterface
    {
        return new $className();
    }
}
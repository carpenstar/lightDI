<?php
namespace DependencyInjection\Fabrics\FileLoader;

use DependencyInjection\Fabrics\AFabric;
use DependencyInjection\File\Interfaces\IFileLoaderInterface;

class FileLoaderFabric extends AFabric
{
    public static function make(string $className) : IFileLoaderInterface
    {
        return new $className();
    }
}
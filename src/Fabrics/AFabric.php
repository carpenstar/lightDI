<?php
namespace DependencyInjection\Fabrics;

abstract class AFabric implements IFabricInterface
{
    abstract public static function make(string $className);
}
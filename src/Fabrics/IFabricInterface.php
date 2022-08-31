<?php
namespace Carpenstar\DependencyInjection\Fabrics;

interface IFabricInterface
{
    public static function make(string $className);
}
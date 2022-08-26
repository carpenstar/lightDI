<?php
namespace DependencyInjection\Fabrics;

interface IFabricInterface
{
    public static function make(string $className);
}
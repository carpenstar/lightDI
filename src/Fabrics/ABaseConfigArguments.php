<?php
namespace Carpenstar\DependencyInjection\Fabrics;

use Carpenstar\DependencyInjection\Config\Interfaces\Builder\Args\IArgsInterface;
use Carpenstar\DependencyInjection\Config\Interfaces\Builder\IConfigBuilderArgInterface;

abstract class ABaseConfigArguments implements IConfigBuilderArgInterface
{
    abstract public static function make(string $className, string $id, $blockData): IArgsInterface;
}
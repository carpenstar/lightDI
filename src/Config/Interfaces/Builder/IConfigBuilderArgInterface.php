<?php
namespace Carpenstar\DependencyInjection\Config\Interfaces\Builder;

use Carpenstar\DependencyInjection\Config\Interfaces\Builder\Args\IArgsInterface;

interface IConfigBuilderArgInterface
{
    /**
     * @param string $id
     * @param $blockData
     */
    public static function make(string $className, string $id, $blockData): IArgsInterface;
}
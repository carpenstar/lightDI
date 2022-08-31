<?php
namespace Carpenstar\DependencyInjection\Config\Interfaces\Builder\Args;

interface IArgsInterface
{
    public function __construct($blockId, $blockData);
}
<?php
namespace DependencyInjection\Fabrics\ConfigBuilder;

use DependencyInjection\Config\Interfaces\Builder\Args\IArgsInterface;
use DependencyInjection\Fabrics\ABaseConfigArguments;

class ConfigBuilderArguments extends ABaseConfigArguments
{
    public static function make(string $className, string $id, $blockData): IArgsInterface
    {
        return (new $className($id, $blockData));
    }
}
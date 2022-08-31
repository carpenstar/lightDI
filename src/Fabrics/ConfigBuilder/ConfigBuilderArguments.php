<?php
namespace Carpenstar\DependencyInjection\Fabrics\ConfigBuilder;

use Carpenstar\DependencyInjection\Config\Interfaces\Builder\Args\IArgsInterface;
use Carpenstar\DependencyInjection\Fabrics\ABaseConfigArguments;

class ConfigBuilderArguments extends ABaseConfigArguments
{
    public static function make(string $className, string $id, $blockData): IArgsInterface
    {
        return (new $className($id, $blockData));
    }
}
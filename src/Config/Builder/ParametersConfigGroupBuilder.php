<?php
namespace Carpenstar\DependencyInjection\Config\Builder;

use Carpenstar\DependencyInjection\Config\Args\ParamArgs;
use Carpenstar\DependencyInjection\Fabrics\ConfigBuilder\ConfigBuilderArguments;
use Carpenstar\DependencyInjection\Config\Interfaces\Builder\IHandlerGroupBuilder;

class ParametersConfigGroupBuilder implements IHandlerGroupBuilder
{
    const CONFIG_PARAM_GROUP = "parameters";

    /**
     * @param array $data
     * @return array
     */
    public function build(array $data): array
    {
        $configData = [];
        foreach ($data as $id => $blockData) {
            $configData[$id] = ConfigBuilderArguments::make(ParamArgs::class, $id, $blockData);
        }
        return $configData;
    }
}
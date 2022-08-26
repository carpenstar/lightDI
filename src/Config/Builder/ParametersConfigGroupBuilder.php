<?php
namespace DependencyInjection\Config\Builder;

use DependencyInjection\Config\Args\ParamArgs;
use DependencyInjection\Fabrics\ConfigBuilder\ConfigBuilderArguments;
use DependencyInjection\Config\Interfaces\Builder\IHandlerGroupBuilder;

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
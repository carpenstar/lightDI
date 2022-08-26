<?php
namespace DependencyInjection\Config\Builder;

use DependencyInjection\Config\Args\ServiceArgs;
use DependencyInjection\Fabrics\ConfigBuilder\ConfigBuilderArguments;
use DependencyInjection\Config\Interfaces\Builder\IHandlerGroupBuilder;

class ServicesConfigGroupBuilder implements IHandlerGroupBuilder
{
    const CONFIG_PARAM_GROUP = "services";

    /**
     * @param array $data
     * @return array
     */
    public function build(array $data): array
    {
        $configData = [];
        foreach ($data as $id => $blockData)
        {
            $configData[$id] = ConfigBuilderArguments::make(ServiceArgs::class, $id, $blockData);
        }

        return $configData;
    }
}
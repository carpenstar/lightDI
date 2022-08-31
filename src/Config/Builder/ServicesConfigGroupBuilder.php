<?php
namespace Carpenstar\DependencyInjection\Config\Builder;

use Carpenstar\DependencyInjection\Config\Args\ServiceArgs;
use Carpenstar\DependencyInjection\Fabrics\ConfigBuilder\ConfigBuilderArguments;
use Carpenstar\DependencyInjection\Config\Interfaces\Builder\IHandlerGroupBuilder;

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
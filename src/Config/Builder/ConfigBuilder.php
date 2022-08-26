<?php
namespace DependencyInjection\Config\Builder;

use DependencyInjection\Config\Interfaces\Builder\IConfigBuilderInterface;

class ConfigBuilder implements IConfigBuilderInterface
{
    /** @return string[] */
    protected static function getGroups(): array
    {
        return [
            ParametersConfigGroupBuilder::CONFIG_PARAM_GROUP => ParametersConfigGroupBuilder::class,
            ServicesConfigGroupBuilder::CONFIG_PARAM_GROUP => ServicesConfigGroupBuilder::class
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    public function build(array $data): array
    {
        $config = [];
        foreach ($data as $keyGroup => $valGroup) {
            if (array_key_exists($keyGroup, static::getGroups())) {
                $handler = static::getGroups()[$keyGroup];
                // todo вынести в фабрику
                $config[$keyGroup] = (new $handler())->build($valGroup);
            }
        }

        return $config;
    }
}
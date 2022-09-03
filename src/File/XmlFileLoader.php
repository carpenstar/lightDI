<?php
namespace Carpenstar\DependencyInjection\File;

use Carpenstar\DependencyInjection\Config\Builder\ParametersConfigGroupBuilder;
use Carpenstar\DependencyInjection\Config\Builder\ServicesConfigGroupBuilder;
use Carpenstar\DependencyInjection\File\Abstracts\AFileLoader;

class XmlFileLoader extends AFileLoader
{
    /**
     * @return array
     * @throws \Exception
     */
    public function load(): array
    {
        $config = [
            ParametersConfigGroupBuilder::CONFIG_PARAM_GROUP => [],
            ServicesConfigGroupBuilder::CONFIG_PARAM_GROUP => []
        ];

        $xmlFile = file_get_contents($this->filePath);
        $xmlData = (array)(new \SimpleXMLElement($xmlFile));

        foreach($xmlData[ParametersConfigGroupBuilder::CONFIG_PARAM_GROUP] as $parameter) {
            /** @var \SimpleXMLElement $parameter */
           $paramAttributes = current($parameter->attributes());
           $config[ParametersConfigGroupBuilder::CONFIG_PARAM_GROUP][$paramAttributes["id"]] = $paramAttributes["value"];
        }

        foreach($xmlData[ServicesConfigGroupBuilder::CONFIG_PARAM_GROUP] as $service) {
            /** @var \SimpleXMLElement $service */
            $serviceParameters = current($service->attributes());
            $serviceArray = [
                "class" => $serviceParameters["class"],
                "parameters" => []
            ];

            if (!empty($serviceParameters["network"])) {
                $serviceArray["network"] = $serviceParameters["network"];
            }

            if (!empty($serviceArguments = current($service->parameters)) && is_array($serviceArguments)) {
                foreach ($serviceArguments as $argument) {
                    $serviceArray["parameters"][] = $argument;
                }
            } elseif (!empty($serviceArguments) && !is_array($serviceArguments)) {
                $serviceArray["parameters"][] = $serviceArguments;
            }

            $config[ServicesConfigGroupBuilder::CONFIG_PARAM_GROUP][$serviceParameters["id"]] = $serviceArray;
        }

        return $config;
    }
}
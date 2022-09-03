<?php
namespace Carpenstar\DependencyInjection\File;

use Carpenstar\DependencyInjection\File\Abstracts\AFileLoader;

class XmlFileLoader extends AFileLoader
{

    const CONFIG_BLOCK_PARAMETERS = "parameters";
    const CONFIG_BLOCK_SERVICES = "services";

    /**
     * @return array
     * @throws \Exception
     */
    public function load(): array
    {
        $config = [
            self::CONFIG_BLOCK_PARAMETERS => [],
            self::CONFIG_BLOCK_SERVICES => []
        ];

        $xmlFile = file_get_contents($this->filePath);
        $xmlData = (array)(new \SimpleXMLElement($xmlFile));

        foreach($xmlData[self::CONFIG_BLOCK_PARAMETERS] as $parameter) {
            /** @var \SimpleXMLElement $parameter */
           $paramAttributes = current($parameter->attributes());
           $config[self::CONFIG_BLOCK_PARAMETERS][$paramAttributes["id"]] = $paramAttributes["value"];
        }

        foreach($xmlData[self::CONFIG_BLOCK_SERVICES] as $service) {
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

            $config[self::CONFIG_BLOCK_SERVICES][$serviceParameters["id"]] = $serviceArray;
        }

        return $config;
    }
}
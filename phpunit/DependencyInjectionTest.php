<?php
use PHPUnit\Framework\TestCase;
use DependencyInjection\Config\Builder\ConfigBuilder;
use DependencyInjection\Fabrics\ConfigBuilder\ConfigBuilderFabric;
use DependencyInjection\Fabrics\FileLoader\FileLoaderFabric;
use DependencyInjection\File\XmlFileLoader;
use DependencyInjection\File\YmlFileLoader;
use DependencyInjection\DependencyInjection;
use DependencyInjection\System\SystemConfig;

class DependencyInjectionTest extends TestCase
{
    const CONTAINER_ID = "component.db_default";
    const FILE_PATH_CONFIG_YML = "/app/config/config.yml";
    const FILE_PATH_CONFIG_XML = "/app/config/config.xml";

    const CONFIG_DATA_YML = [
        "config_path" => "/app/config/config.yml"
    ];

    const CONFIG_DATA_XML = [
        "config_path" => "/app/config/config.xml"
    ];

    public function testSysConfig()
    {
        $sysConfig = new SystemConfig(self::CONFIG_DATA_YML);
        $this->assertInstanceOf(SystemConfig::class, $sysConfig);
        return $sysConfig;
    }


    /** Тестирование загрузчика YML-конфигурации сервисов и параметров */
    public function testYmlFileLoader()
    {
        /** @var YmlFileLoader $ymlLoader */
        $ymlLoader = FileLoaderFabric::make(YmlFileLoader::class);
        $ymlLoader->setFilePath(self::CONFIG_DATA_YML["config_path"]);

        $this->assertInstanceOf(YmlFileLoader::class, $ymlLoader);
    }

    /** Тестирование загрузчика XML-конфигурации сервисов и параметров */
    public function testXmlFileLoader()
    {
        /** @var XmlFileLoader $xmlLoader */
        $xmlLoader = FileLoaderFabric::make(XmlFileLoader::class);
        $xmlLoader->setFilePath(self::CONFIG_DATA_XML["config_path"]);

        $this->assertInstanceOf(XmlFileLoader::class, $xmlLoader);
    }

    /** Тестирование получения билдера объекта конфигурации */
    public function testConfigBuilder()
    {
        $configBuilderInstance = ConfigBuilderFabric::make(ConfigBuilder::class);
        $this->assertInstanceOf(ConfigBuilder::class, $configBuilderInstance);
    }

    /**
     * Тестирование создания сервиса
     * @depends testSysConfig
     */
    public function testNetworkBuilder(SystemConfig $sysConfig)
    {
        $depInjection = new DependencyInjection($sysConfig);
        $this->assertInstanceOf(DependencyInjection::class, $depInjection);

        $depInjection->getNetwork("main")->getService("component.db_default");
    }

}
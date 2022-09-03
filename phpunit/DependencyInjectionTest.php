<?php
use PHPUnit\Framework\TestCase;
use Carpenstar\DependencyInjection\Config\Builder\ConfigBuilder;
use Carpenstar\DependencyInjection\Fabrics\ConfigBuilder\ConfigBuilderFabric;
use Carpenstar\DependencyInjection\Fabrics\FileLoader\FileLoaderFabric;
use Carpenstar\DependencyInjection\File\YmlFileLoader;
use Carpenstar\DependencyInjection\File\XmlFileLoader;
use Carpenstar\DependencyInjection\DependencyInjection;
use Carpenstar\DependencyInjection\System\SystemConfig;
use Carpenstar\Examples\ExampleSomething;
use Carpenstar\Examples\ExampleTable;
use Carpenstar\Examples\ExampleEmployee;
use Carpenstar\Examples\ExampleUser;

class DependencyInjectionTest extends TestCase
{
    const CONFIG_DATA_YML = [
        "config_path" => "/app/example/config/config.yml",
        "is_use_network_data" => true
    ];

    const CONFIG_DATA_XML = [
        "config_path" => "/app/example/config/config.xml",
        "is_use_network_data" => true
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
        /** @var XmlFileLoader $ymlLoader */
        $ymlLoader = FileLoaderFabric::make(XmlFileLoader::class);
        $ymlLoader->setFilePath(self::CONFIG_DATA_XML["config_path"]);

        $this->assertInstanceOf(XmlFileLoader::class, $ymlLoader);
    }

    /** Тестирование получения билдера объекта конфигурации */
    public function testConfigBuilder()
    {
        $configBuilderInstance = ConfigBuilderFabric::make(ConfigBuilder::class);
        $this->assertInstanceOf(ConfigBuilder::class, $configBuilderInstance);
    }

    /**
     * Тестирование сервиса component.simple.example
     * @depends testSysConfig
     */
    public function testComponentSimpleExample(SystemConfig $sysConfig)
    {
        $depInjection = new DependencyInjection($sysConfig);
        $simpleExample = $depInjection->getService("component.simple.example");
        $this->assertInstanceOf(ExampleUser::class, $simpleExample);
    }

    /**
     * Тестирование сервиса component.base.example.employee
     * @depends testSysConfig
     */
    public function testComponentBaseExampleEmployee(SystemConfig $sysConfig)
    {
        $depInjection = new DependencyInjection($sysConfig);
        $exampleEmployee = $depInjection->getService("component.base.example.employee");
        $this->assertInstanceOf(ExampleEmployee::class, $exampleEmployee);
    }

    /**
     * Тестирование сервиса component.network.example.table
     * @depends testSysConfig
     */
    public function testComponentNetworkDependType(SystemConfig $sysConfig)
    {
        $depInjection = new DependencyInjection($sysConfig);
        $network = $depInjection->getNetwork("main");

        /** @var ExampleTable $table */
        $table = $network->getService("component.network.example.table");
        $this->assertInstanceOf(ExampleTable::class, $table);
        $this->assertInstanceOf(ExampleSomething::class, $table->getCup());
        $this->assertInstanceOf(ExampleSomething::class, $table->getNotebook());

        $table->showTableContains();
    }

}
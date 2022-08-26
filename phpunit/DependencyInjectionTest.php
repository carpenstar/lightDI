<?php
use PHPUnit\Framework\TestCase;
use DependencyInjection\Config\Builder\ConfigBuilder;
use DependencyInjection\Fabrics\ConfigBuilder\ConfigBuilderFabric;
use DependencyInjection\Fabrics\Config\ConfigFabric;
use DependencyInjection\Fabrics\FileLoader\FileLoaderFabric;
use DependencyInjection\File\XmlFileLoader;
use DependencyInjection\File\YmlFileLoader;
use DependencyInjection\Config\Interfaces\IConfigInterface;
use DependencyInjection\DependencyInjection;
use DependencyInjection\Config\Config;
use DependencyInjection\Fabrics\Config\ConfigFabricAdditional;
use DependencyInjection\System\SystemConfig;

class DependencyInjectionTest extends TestCase
{
    const CONTAINER_ID = "component.db_default";
    const FILE_PATH_CONFIG_YML = "/app/config/config.yml";
    const FILE_PATH_CONFIG_XML = "/app/config/config.xml";


    public function testSysConfig()
    {
        $sysConfig = new SystemConfig();
        $sysConfig->setServiceConfigFilePath(self::FILE_PATH_CONFIG_YML);

        $this->assertInstanceOf(SystemConfig::class, $sysConfig);
        return $sysConfig;
    }


    /** Тестирование загрузчика YML-конфигурации сервисов и параметров */
    public function testYmlFileLoader()
    {
        /** @var YmlFileLoader $ymlLoader */
        $ymlLoader = FileLoaderFabric::make(YmlFileLoader::class);
        $ymlLoader->setFilePath(self::FILE_PATH_CONFIG_YML);

        $this->assertInstanceOf(YmlFileLoader::class, $ymlLoader);
    }

    /** Тестирование загрузчика XML-конфигурации сервисов и параметров */
    public function testXmlFileLoader()
    {
        /** @var XmlFileLoader $xmlLoader */
        $xmlLoader = FileLoaderFabric::make(XmlFileLoader::class);
        $xmlLoader->setFilePath(self::FILE_PATH_CONFIG_XML);

        $this->assertInstanceOf(XmlFileLoader::class, $xmlLoader);
    }

    /** Тестирование получения билдера объекта конфигурации */
    public function testConfigBuilder()
    {
        $configBuilderInstance = ConfigBuilderFabric::make(ConfigBuilder::class);
        $this->assertInstanceOf(ConfigBuilder::class, $configBuilderInstance);
    }

    /**
     * Тестирование создания обьекта конфигурации при помощи yml-лоадера
     */
    public function testCreateYMLConfigurationArray()
    {
        $additional = (new ConfigFabricAdditional())
            ->setServiceConfigFilePath(self::FILE_PATH_CONFIG_YML)
            ->setFileLoaderClassName(YmlFileLoader::class)
            ->setConfigBuilderClassName(ConfigBuilder::class);

        $config = ConfigFabric::make(Config::class, $additional);
        $this->assertInstanceOf(IConfigInterface::class, $config);

        $config->build();

        $this->assertNotEmpty($config->getParameters());
        $this->assertNotEmpty($config->getServices());
    }

    /**
     * Тестирование извлечения обьекта сервиса
     * @depends testSysConfig
     */
    public function testDependencyInjection(SystemConfig $sysConfig)
    {
        $depInjection = new DependencyInjection($sysConfig);
        $this->assertInstanceOf(DependencyInjection::class, $depInjection);

        $testObject = $depInjection->getService(self::CONTAINER_ID);
        $this->assertInstanceOf(\Examples\Request::class, $testObject);
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
<?php
namespace Carpenstar\DependencyInjection\Container;

use Carpenstar\DependencyInjection\Fabrics\ServiceItem\ServiceItemBuildParam;
use Carpenstar\DependencyInjection\Container\Interfaces\IServiceItemInterface;

class ServiceItem implements IServiceItemInterface
{
    /** @var string $containerId */
    private string $containerId;

    /** @var array $parameters */
    private array $parameters;

    /** @var string $className */
    private string $className;

    /** @var object $instance */
    private object $instance;

    /** @var object|null */
    private ?object $networkData;

    /**
    * @param ServiceItemBuildParam $additional
    * @throws \ReflectionException
    */
    public function __construct(ServiceItemBuildParam $additional)
    {
        $args = $additional->getServiceArgs();
        $this->containerId = $args->getId();
        $this->className = $args->getClassName();
        $this->parameters = $args->getArgs();
        $this->networkData = $additional->getNetworkData();
        $this->build();
    }

    /**
     * Создание экземпляра обьекта для DI
     * @return $this
     * @throws \ReflectionException
     */
    public function build(): self
    {
        $this->createInstance();
        return $this;
    }

    /**
     * Уникальная подпись контейнера в коллекции
     * @return string
     */
    public function getSign(): string
    {
        return $this->containerId;
    }

    /**
     * Формирование обьекта из прокси
     * @return object
     */
    public function extract(): object
    {
        return $this->instance;
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    private function createInstance(): void
    {
        $this->instance = (new \ReflectionClass($this->className))->newInstanceArgs($this->parameters);
        $this->instance->networkData = $this->networkData;
    }
}
<?php
namespace Carpenstar\DependencyInjection\ServiceManager;

use Carpenstar\DependencyInjection\Config\Args\ServiceArgs;
use Carpenstar\DependencyInjection\Config\Interfaces\IConfigInterface;
use Carpenstar\DependencyInjection\Container\Interfaces\IServiceCollectionInterface;
use Carpenstar\DependencyInjection\Container\ServiceCollection;
use Carpenstar\DependencyInjection\Fabrics\ServiceCollection\ServiceCollectionFabric;
use Carpenstar\DependencyInjection\Fabrics\ServiceItem\ServiceItemBuildParam;
use Carpenstar\DependencyInjection\Fabrics\ServiceItem\ServiceItemFabric;
use Carpenstar\DependencyInjection\Fabrics\ServiceManager\ServiceManagerBuildParam;
use Carpenstar\DependencyInjection\Container\ServiceItem;
use Carpenstar\DependencyInjection\Fabrics\IFabricBuildParamInterface;
use Carpenstar\DependencyInjection\Network\NetworkData;
use Carpenstar\DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;

class ServiceManager implements IServiceManagerInterface
{
    /** @var IConfigInterface $config */
    protected IConfigInterface $config;

    /** @var IServiceCollectionInterface $collectionContainer */
    protected IServiceCollectionInterface $collectionContainer;

    /** @var NetworkData $networkData */
    protected NetworkData $networkData;

    /** @param ServiceManagerBuildParam $additional */
    public function __construct(IFabricBuildParamInterface $additional)
    {
        $this->config = $additional->getConfig();
        $this->collectionContainer = ServiceCollectionFabric::make(ServiceCollection::class);
    }

    /**
     * Создание нового сервис-элемента
     * @param string $serviceId
     * @return object
     * @throws \ReflectionException
     */
    public function get(string $serviceId): object
    {
        if (empty($container = $this->collectionContainer->findService($serviceId))) {
            $parameters = (new ServiceItemBuildParam())->setServiceArgs($this->handleServiceArguments($serviceId));

            if (!empty($this->networkData)) {
                $parameters->setNetworkData($this->networkData);
            }
            $container = ServiceItemFabric::make(ServiceItem::class, $parameters);
            $this->collectionContainer->push($container);
        }

        return $container->extract();
    }

    /**
     * @param NetworkData|null $networkData
     * @return $this
     */
    public function setNetworkData(?NetworkData $networkData): self
    {
        $this->networkData = $networkData;
        return $this;
    }

    /** @return NetworkData|null */
    public function getNetworkData(): ?NetworkData
    {
        return $this->networkData;
    }

    /**
     * @param string $serviceId
     * @return ServiceArgs
     * @throws \ReflectionException
     */
    private function handleServiceArguments(string $serviceId): ServiceArgs
    {
        $parameters = $this->config->getServiceArgs($serviceId);

        foreach ($parameters->getArgs() as $index => $parameter) {
            switch (substr($parameter, 0,1)) {
                case '@':
                    $parameters->setArgumentValue($index, $this->get(substr($parameter, 1)));
                    break;
                case '%':
                    $parameters->setArgumentValue($index,
                        $this->config->getParameter(substr($parameter, 1))->getArgs()
                    );
                    break;
            }
        }

        return $parameters;
    }
}
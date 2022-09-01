<?php
namespace Carpenstar\DependencyInjection\ServiceManager;

use Carpenstar\DependencyInjection\Config\Args\ServiceArgs;
use Carpenstar\DependencyInjection\Container\ServiceCollection;
use Carpenstar\DependencyInjection\Fabrics\ServiceCollection\ServiceCollectionFabric;
use Carpenstar\DependencyInjection\Fabrics\ServiceItem\ServiceItemParametersBag;
use Carpenstar\DependencyInjection\Fabrics\ServiceItem\ServiceItemFabric;
use Carpenstar\DependencyInjection\Fabrics\ServiceManager\ServiceManagerConfigParametersBag;
use Carpenstar\DependencyInjection\Container\ServiceItem;
use Carpenstar\DependencyInjection\Fabrics\IFabricParametersBagInterface;
use Carpenstar\DependencyInjection\Network\NetworkDataBag;
use Carpenstar\DependencyInjection\ServiceManager\Abstracts\ABaseServiceManager;

class ServiceManager extends ABaseServiceManager
{
    /** @param ServiceManagerConfigParametersBag $additional */
    public function __construct(IFabricParametersBagInterface $additional)
    {
        parent::__construct($additional);
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
            $parameters = (new ServiceItemParametersBag())->setServiceArgs($this->handleServiceArguments($serviceId));

            if (!empty($this->networkData)) {
                $parameters->setNetworkData($this->networkData);
            }
            $container = ServiceItemFabric::make(ServiceItem::class, $parameters);
            $this->collectionContainer->push($container);
        }

        return $container->extract();
    }

    /**
     * @param string $serviceId
     * @return ServiceArgs
     * @throws \ReflectionException
     */
    private function handleServiceArguments(string $serviceId): ServiceArgs
    {
        try {
            $parameters = $this->config->getServiceArgs($serviceId);
        } catch (\Exception $e) {
            var_dump($e->getMessage()); die;
        }

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
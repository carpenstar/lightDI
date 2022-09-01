<?php
namespace Carpenstar\DependencyInjection\ServiceManager\Abstracts;

use Carpenstar\DependencyInjection\Config\Interfaces\IConfigInterface;
use Carpenstar\DependencyInjection\Fabrics\IFabricParametersBagInterface;
use Carpenstar\DependencyInjection\Container\Interfaces\IServiceCollectionInterface;
use Carpenstar\DependencyInjection\Fabrics\ServiceManager\ServiceManagerConfigParametersBag;
use Carpenstar\DependencyInjection\Network\NetworkDataBag;
use Carpenstar\DependencyInjection\ServiceManager\Interfaces\IServiceManagerInterface;

abstract class ABaseServiceManager implements IServiceManagerInterface
{
    /** @var IConfigInterface $config */
    protected IConfigInterface $config;

    /** @var IServiceCollectionInterface $collectionContainer */
    protected IServiceCollectionInterface $collectionContainer;

    /** @var NetworkDataBag $networkData */
    protected ?NetworkDataBag $networkData;

    /** @param ServiceManagerConfigParametersBag $additional */
    public function __construct(IFabricParametersBagInterface $additional)
    {
        $this->config = $additional->getConfig();
    }

    /**
     * @param NetworkDataBag|null $networkData
     * @return $this
     */
    public function setNetworkData(?NetworkDataBag $networkData): self
    {
        $this->networkData = $networkData;
        return $this;
    }

    /** @return NetworkDataBag|null */
    public function getNetworkData(): ?NetworkDataBag
    {
        return $this->networkData;
    }
}
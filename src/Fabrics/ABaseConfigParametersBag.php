<?php
namespace Carpenstar\DependencyInjection\Fabrics;

use Carpenstar\DependencyInjection\Network\NetworkDataBag;

abstract class ABaseConfigParametersBag implements IFabricParametersBagInterface
{
    /** @var NetworkDataBag $networkData */
    private NetworkDataBag $networkData;

    public function __construct()
    {
        $this->networkData = NetworkDataBag::getInstance();
    }
}
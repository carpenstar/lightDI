<?php
namespace Carpenstar\DependencyInjection\Fabrics;

use Carpenstar\DependencyInjection\Network\NetworkData;

abstract class ABaseConfigBuildParam implements IFabricBuildParamInterface
{
    /** @var NetworkData $networkData */
    private NetworkData $networkData;

    public function __construct()
    {
        $this->networkData = NetworkData::getInstance();
    }
}
<?php
namespace Carpenstar\DependencyInjection\System;

use Carpenstar\DependencyInjection\Network\NetworkData;

abstract class BaseNetworkClass
{
    /** @return NetworkData */
    protected function getNetworkData(): NetworkData
    {
        return $this->networkData;
    }
}
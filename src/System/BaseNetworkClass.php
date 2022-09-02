<?php
namespace Carpenstar\DependencyInjection\System;

use Carpenstar\DependencyInjection\Network\NetworkDataBag;

abstract class BaseNetworkClass
{
    /** @return NetworkDataBag */
    protected function getNetworkData(): NetworkDataBag
    {
        return $this->networkData;
    }
}
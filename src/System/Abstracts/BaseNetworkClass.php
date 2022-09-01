<?php
namespace Carpenstar\DependencyInjection\System\Abstracts;

use Carpenstar\DependencyInjection\Network\NetworkDataBag;

abstract class BaseNetworkClass
{
    /** @return NetworkDataBag */
    protected function getNetworkData(): NetworkDataBag
    {
        return $this->networkData;
    }
}
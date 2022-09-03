<?php
namespace Carpenstar\Examples;

use Carpenstar\DependencyInjection\Network\Network;

class ExampleSomething
{
    /** @var string $itemName */
    private string $itemName;

    /** @var int $itemCount */
    private int $itemCount = 0;

    /** @param string $itemName */
    public function __construct(string $itemName)
    {
        $this->itemName = $itemName;
    }

    /** @return string */
    public function getItemName(): string
    {
        return $this->itemName;
    }

    /** @return $this */
    public function addItem(): self
    {
        Network::getNetworkData()->setParameter("main", $this->itemName, $this->itemCount++);
        return $this;
    }

}
<?php
namespace Carpenstar\Examples;

use Carpenstar\DependencyInjection\System\Abstracts\BaseNetworkClass;

class ExampleSomething extends BaseNetworkClass
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
        $this->itemCount++;
        $this->getNetworkData()->setParameter($this->itemName, $this->itemCount);
        return $this;
    }

}
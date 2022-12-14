<?php
namespace Carpenstar\DependencyInjection\Config\Args;

use Carpenstar\DependencyInjection\Config\Args\Abstracts\ABaseArgs;

class ParamArgs extends ABaseArgs
{
    public function __construct($blockId, $blockData)
    {
        $this->setId($blockId);
        $this->setArgs($blockData);
    }

    /** @return string */
    public function getArgs(): string
    {
        return $this->args;
    }
}
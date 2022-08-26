<?php
namespace DependencyInjection\Config\Args;

use DependencyInjection\Config\Args\Abstracts\ABaseArgs;

class ServiceArgs extends ABaseArgs
{
    /** @var string $className */
    protected string $className;

    /**
     * @param $id
     * @param $blockData
     */
    public function __construct($id, $blockData)
    {
        $this->setId($id);
        $this->setClassName($blockData["class"]);
        $this->setArgs($blockData["parameters"]);
        $this->setNetwork($blockData["network"]);
    }

    /** @return string */
    public function getClassName(): string
    {
        return $this->className;
    }

    /** @return array */
    public function getArgs(): array
    {
        return $this->args;
    }

    /**
     * @param int $index
     * @param $value
     * @return $this
     */
    public function setArgumentValue(int $index, $value): self
    {
        $this->args[$index] = $value;
        return $this;
    }

    /**
     * @param $args
     * @return $this
     */
    protected function setArgs($args): self
    {
        $this->args = $args;
        return $this;
    }

    /**
     * @param string $className
     * @return $this
     */
    protected function setClassName(string $className): self
    {
        $this->className = $className;
        return $this;
    }
}
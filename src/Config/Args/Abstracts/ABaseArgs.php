<?php
namespace Carpenstar\DependencyInjection\Config\Args\Abstracts;

use Carpenstar\DependencyInjection\Config\Interfaces\Builder\Args\IArgsInterface;

abstract class ABaseArgs implements IArgsInterface
{
    const DEFAULT_NETWORK = "_default";

    /** @var string $containerId */
    protected string $id;

    /** @var mixed $parameters */
    protected $args;

    /** @var string $network */
    protected string $network;

    /**
     * @param $id
     * @param $blockData
     */
    abstract public function __construct($id, $blockData);

    /** @return string */
    public function getId(): string
    {
        return $this->id;
    }

    /** @return string */
    public function getNetwork(): string
    {
        return $this->network;
    }

    /** @return mixed */
    public function getArgs()
    {
        return $this->args;
    }

    /**
     * @param string $id
     * @return $this
     */
    protected function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $args
     * @return $this
     */
    protected function setArgs($args): self
    {
        $this->args = $args;
        return $this;
    }

    /**
     * @param string|null $network
     * @return $this
     */
    protected function setNetwork(?string $network): self
    {
        $this->network = $network;
        return $this;
    }
}
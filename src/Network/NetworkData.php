<?php
namespace Carpenstar\DependencyInjection\Network;

class NetworkData
{
    /** @var array $parameters */
    private array $parameters = [];

    /** @var NetworkData */
    private static NetworkData $instance;

    private function __construct() {}

    /** @return NetworkData */
    public static function getInstance(): NetworkData
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param string $paramName
     * @return mixed
     */
    public function getParameter(string $paramName)
    {
        return $this->parameters[$paramName];
    }

    /** @return array */
    public function getListParameters(): array
    {
        return array_keys($this->parameters);
    }

    /**
     * @param string $paramName
     * @param $value
     * @return $this
     */
    public function setParameter(string $paramName, $value): self
    {
        $this->parameters[$paramName] = $value;
        return $this;
    }
}
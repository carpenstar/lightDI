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
     * @param string $networkId
     * @param string $paramName
     * @return mixed
     */
    public function getParameter(string $networkId, string $paramName)
    {
        return $this->parameters[$networkId][$paramName];
    }

    /**
     * @param string $networkId
     * @return array
     */
    public function getListNetworkParameters(string $networkId): array
    {
        return array_keys($this->parameters[$networkId]);
    }

    /**
     * @param string $networkId
     * @return array
     */
    public function getListNetworkDataParameters(string $networkId): array
    {
        return $this->parameters[$networkId];
    }

    /**
     * @param string $networkId
     * @param string $paramName
     * @param $value
     * @return $this
     */
    public function setParameter(string $networkId, string $paramName, $value): self
    {
        $this->parameters[$networkId][$paramName] = $value;
        return $this;
    }

    /**
     * @param string $networkId
     * @return $this
     */
    public function registerNetwork(string $networkId): self
    {
        $this->parameters[$networkId] = [];
        return $this;
    }
}
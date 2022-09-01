<?php
namespace Carpenstar\DependencyInjection\Network;

class NetworkDataBag
{
    /** @var array $parameters */
    private array $parameters = [];

    /** @var NetworkDataBag */
    private static NetworkDataBag $instance;

    private function __construct() {}

    /** @return NetworkDataBag */
    public static function getInstance(): NetworkDataBag
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
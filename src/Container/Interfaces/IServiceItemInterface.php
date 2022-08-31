<?php
namespace Carpenstar\DependencyInjection\Container\Interfaces;

use Carpenstar\DependencyInjection\Config\Args\ServiceArgs;

interface IServiceItemInterface
{
    /**
     * @param ServiceArgs $args
     * @return mixed
     */
    public function build() : self;

    /** @return string */
    public function getSign(): string;

    /** @return object */
    public function extract(): object;
}
<?php
namespace DependencyInjection\Config\Interfaces\Builder;

interface IConfigBuilderInterface
{
    /**
     * @param array $data
     * @return array
     */
    public function build(array $data): array;
}
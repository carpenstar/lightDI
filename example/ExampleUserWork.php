<?php
namespace Carpenstar\Examples;

class ExampleUserWork
{
    /** @var string $phone */
    private string $work;

    /** @param string $work */
    public function __construct(string $work)
    {
        $this->work = $work;
    }

    /** @return string */
    public function getWork(): string
    {
        return $this->work;
    }

}
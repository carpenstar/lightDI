<?php
namespace Carpenstar\Examples;

class ExampleUser
{
    /** @var string $name */
    private string $name;

    /** @var string $surname */
    private string $surname;

    /**
     * @param string $name
     * @param string $surname
     */
    public function __construct(string $name, string $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->showFullName();
    }

    /** @return void */
    private function showFullName(): void
    {
        echo "{$this->name} {$this->surname}" . PHP_EOL;
    }
}
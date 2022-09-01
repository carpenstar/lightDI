<?php
namespace Carpenstar\Examples;

class ExampleEmployee
{
    /** @var string $name */
    private string $name;

    /** @var string $surname */
    private string $surname;

    /** @var ExampleUserPhone $userPhone */
    private ExampleUserPhone $userPhone;

    /**
     * @param string $name
     * @param string $surname
     * @param ExampleUserPhone $userPhone
     */
    public function __construct(string $name, string $surname, ExampleUserPhone $userPhone)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->userPhone = $userPhone;
        $this->showMessage();
    }

    /** @return void */
    private function showMessage(): void
    {
        echo "{$this->name} {$this->surname} has a phone: " .
            $this->userPhone->getPhone() . " and works in " . $this->userPhone->getUserWork()->getWork() . PHP_EOL;
    }
}
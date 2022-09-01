<?php
namespace Carpenstar\Examples;

class ExampleUserPhone
{
    /** @var string $phone */
    private string $phone;

    /** @var ExampleUserWork $userWork */
    private ExampleUserWork $userWork;

    /**
     * @param string $phone
     * @param ExampleUserWork $userWork
     */
    public function __construct(string $phone, ExampleUserWork $userWork)
    {
        $this->phone = $phone;
        $this->userWork = $userWork;
    }

    /** @return string */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /** @return ExampleUserWork */
    public function getUserWork(): ExampleUserWork
    {
        return $this->userWork;
    }

}
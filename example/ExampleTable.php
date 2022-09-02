<?php
namespace Carpenstar\Examples;

use Carpenstar\DependencyInjection\System\BaseNetworkClass;

class ExampleTable extends BaseNetworkClass
{
    /** @var string $name */
    private string $name;

    /** @var ExampleSomething */
    private ExampleSomething $cup;

    /** @var ExampleSomething */
    private ExampleSomething $notebook;

    /**
     * !! Данные (параметры) сети недоступны внутри конструктора
     * @param string $name
     * @param ExampleSomething $cup
     * @param ExampleSomething $notebook
     */
    public function __construct(string $name, ExampleSomething $cup, ExampleSomething $notebook)
    {
        $this->name = $name;
        $this->cup = $cup;
        $this->notebook = $notebook;
    }

    /** @return void */
    public function showTableContains()
    {
        for ($i = 0; $i < rand(1, 10); $i++) {
            $this->cup->addItem();
        }

        for ($i = 0; $i < rand(1, 10); $i++) {
            $this->notebook->addItem();
        }

        $cupName = $this->cup->getItemName();
        $countCup = $this->getNetworkData()->getParameter($this->cup->getItemName());

        $notebookName = $this->notebook->getItemName();
        $countNotebook = $this->getNetworkData()->getParameter($this->notebook->getItemName());

        echo "{$this->name} has {$countCup} {$cupName} and {$countNotebook} {$notebookName}" . PHP_EOL;
    }

    /** @return ExampleSomething */
    public function getCup(): ExampleSomething
    {
        return $this->cup;
    }

    /** @return ExampleSomething */
    public function getNotebook(): ExampleSomething
    {
        return $this->notebook;
    }
}
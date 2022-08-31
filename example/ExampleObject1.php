<?php
namespace Carpenstar\Examples;

class ExampleObject1
{
    private $mode;

    private $test;

    private $request;

    public function __construct(string $mode, string $test, ExampleObject2 $request)
    {
        $this->mode = $mode;
        $this->test = $test;
        $this->request = $request;
    }

    public function showMessage($text)
    {
        echo $text . " - " . $this->mode . ":" . $this->test;
    }

}
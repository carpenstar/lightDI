<?php
namespace Examples;

class Request
{
    private $mode;

    private $test;

    private $request;

    public function __construct(string $mode, string $test, Request2 $request)
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
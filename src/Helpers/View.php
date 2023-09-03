<?php

namespace Src\Helpers;

class View
{
    public function __construct(public string $nameView)
    {
    }

    public function __invoke()
    {
        echo file_get_contents(__DIR__ . '/../views/' . $this->nameView . '.html');
    }
}
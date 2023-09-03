<?php

use Src\Helpers\View;

require __DIR__ . '/../vendor/autoload.php';

function view(string $nameView) {
    $view = new View($nameView);
    return $view();
}

require_once 'routes.php';

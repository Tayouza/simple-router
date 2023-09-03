<?php

use Src\Router\Router;

Router::get('', fn() => view('home'));
Router::get('app', fn() => view('app'));